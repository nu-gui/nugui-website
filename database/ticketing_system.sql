-- NU GUI Email-Driven Ticketing System
-- Database Schema for MySQL
-- Version: 1.0.0
-- Date: 2025-08-09

-- =============================================
-- Table: tickets
-- Main ticket table storing all support tickets
-- =============================================
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_number` VARCHAR(50) NOT NULL UNIQUE,
  `subject` VARCHAR(255) NOT NULL,
  `status` ENUM('open', 'in_progress', 'follow_up', 'escalated', 'resolved', 'closed') DEFAULT 'open',
  `priority` ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
  `category` VARCHAR(100) DEFAULT NULL,
  `product` VARCHAR(100) DEFAULT NULL,
  
  -- Customer Information
  `customer_name` VARCHAR(100) NOT NULL,
  `customer_email` VARCHAR(100) NOT NULL,
  `customer_phone` VARCHAR(50) DEFAULT NULL,
  `customer_company` VARCHAR(100) DEFAULT NULL,
  
  -- Assignment and tracking
  `assigned_to` VARCHAR(100) DEFAULT NULL,
  `assigned_email` VARCHAR(100) DEFAULT NULL,
  `department` VARCHAR(50) DEFAULT 'support',
  
  -- Timestamps
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resolved_at` TIMESTAMP NULL DEFAULT NULL,
  `closed_at` TIMESTAMP NULL DEFAULT NULL,
  `first_response_at` TIMESTAMP NULL DEFAULT NULL,
  
  -- Metrics
  `response_count` INT(11) DEFAULT 0,
  `customer_satisfaction` TINYINT DEFAULT NULL,
  `resolution_time_hours` DECIMAL(10,2) DEFAULT NULL,
  
  -- Email threading
  `email_message_id` VARCHAR(255) DEFAULT NULL,
  `email_thread_id` VARCHAR(255) DEFAULT NULL,
  
  PRIMARY KEY (`id`),
  KEY `idx_ticket_number` (`ticket_number`),
  KEY `idx_status` (`status`),
  KEY `idx_customer_email` (`customer_email`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_email_thread` (`email_thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: ticket_messages
-- Stores all messages/emails in a ticket thread
-- =============================================
CREATE TABLE IF NOT EXISTS `ticket_messages` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `message_type` ENUM('email', 'internal_note', 'system', 'auto_reply') DEFAULT 'email',
  `direction` ENUM('inbound', 'outbound') DEFAULT 'inbound',
  
  -- Message content
  `subject` VARCHAR(255) DEFAULT NULL,
  `message_body` TEXT NOT NULL,
  `message_html` TEXT DEFAULT NULL,
  `message_plain` TEXT DEFAULT NULL,
  
  -- Sender information
  `sender_name` VARCHAR(100) NOT NULL,
  `sender_email` VARCHAR(100) NOT NULL,
  `sender_type` ENUM('customer', 'agent', 'system') DEFAULT 'customer',
  
  -- Email metadata
  `email_message_id` VARCHAR(255) DEFAULT NULL,
  `email_in_reply_to` VARCHAR(255) DEFAULT NULL,
  `email_references` TEXT DEFAULT NULL,
  `email_headers` TEXT DEFAULT NULL,
  
  -- Recipients
  `recipients_to` TEXT DEFAULT NULL,
  `recipients_cc` TEXT DEFAULT NULL,
  `recipients_bcc` TEXT DEFAULT NULL,
  
  -- Status tracking
  `is_read` BOOLEAN DEFAULT FALSE,
  `is_sent` BOOLEAN DEFAULT FALSE,
  `sent_at` TIMESTAMP NULL DEFAULT NULL,
  `delivery_status` VARCHAR(50) DEFAULT NULL,
  
  -- Keyword detection
  `detected_keywords` VARCHAR(255) DEFAULT NULL,
  `triggered_action` VARCHAR(100) DEFAULT NULL,
  
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_email_message_id` (`email_message_id`),
  KEY `idx_created_at` (`created_at`),
  CONSTRAINT `fk_ticket_messages_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: ticket_attachments
-- Stores file attachments for tickets
-- =============================================
CREATE TABLE IF NOT EXISTS `ticket_attachments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `message_id` INT(11) UNSIGNED DEFAULT NULL,
  `filename` VARCHAR(255) NOT NULL,
  `file_path` VARCHAR(500) NOT NULL,
  `file_size` INT(11) DEFAULT NULL,
  `file_type` VARCHAR(100) DEFAULT NULL,
  `uploaded_by` VARCHAR(100) NOT NULL,
  `uploaded_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_message_id` (`message_id`),
  CONSTRAINT `fk_attachments_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_attachments_message` FOREIGN KEY (`message_id`) REFERENCES `ticket_messages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: ticket_cc_recipients
-- Manages CC recipients for tickets
-- =============================================
CREATE TABLE IF NOT EXISTS `ticket_cc_recipients` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) DEFAULT NULL,
  `added_by` VARCHAR(100) NOT NULL,
  `added_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `is_active` BOOLEAN DEFAULT TRUE,
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_ticket_email` (`ticket_id`, `email`),
  KEY `idx_ticket_id` (`ticket_id`),
  CONSTRAINT `fk_cc_recipients_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: ticket_status_history
-- Tracks all status changes for audit trail
-- =============================================
CREATE TABLE IF NOT EXISTS `ticket_status_history` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED NOT NULL,
  `old_status` VARCHAR(50) DEFAULT NULL,
  `new_status` VARCHAR(50) NOT NULL,
  `changed_by` VARCHAR(100) NOT NULL,
  `change_reason` TEXT DEFAULT NULL,
  `triggered_by_keyword` VARCHAR(100) DEFAULT NULL,
  `changed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_ticket_id` (`ticket_id`),
  KEY `idx_changed_at` (`changed_at`),
  CONSTRAINT `fk_status_history_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: email_keywords
-- Configurable keywords for triggering actions
-- =============================================
CREATE TABLE IF NOT EXISTS `email_keywords` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `keyword` VARCHAR(50) NOT NULL,
  `action` VARCHAR(50) NOT NULL,
  `status_change` VARCHAR(50) DEFAULT NULL,
  `priority_change` VARCHAR(50) DEFAULT NULL,
  `auto_response_template` VARCHAR(100) DEFAULT NULL,
  `notify_admin` BOOLEAN DEFAULT FALSE,
  `is_active` BOOLEAN DEFAULT TRUE,
  `description` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_keyword` (`keyword`),
  KEY `idx_action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: email_templates
-- Email templates for auto-responses
-- =============================================
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template_name` VARCHAR(100) NOT NULL UNIQUE,
  `template_type` ENUM('ticket_created', 'status_update', 'auto_reply', 'escalation', 'resolution', 'follow_up') NOT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `body_html` TEXT NOT NULL,
  `body_plain` TEXT NOT NULL,
  `variables` TEXT DEFAULT NULL COMMENT 'JSON array of available template variables',
  `is_active` BOOLEAN DEFAULT TRUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_template_type` (`template_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Table: email_queue
-- Queue for outgoing emails
-- =============================================
CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` INT(11) UNSIGNED DEFAULT NULL,
  `message_id` INT(11) UNSIGNED DEFAULT NULL,
  `to_email` VARCHAR(100) NOT NULL,
  `to_name` VARCHAR(100) DEFAULT NULL,
  `cc_emails` TEXT DEFAULT NULL,
  `bcc_emails` TEXT DEFAULT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `body_html` TEXT NOT NULL,
  `body_plain` TEXT NOT NULL,
  `priority` TINYINT DEFAULT 5,
  `status` ENUM('pending', 'processing', 'sent', 'failed', 'cancelled') DEFAULT 'pending',
  `attempts` INT DEFAULT 0,
  `last_attempt_at` TIMESTAMP NULL DEFAULT NULL,
  `sent_at` TIMESTAMP NULL DEFAULT NULL,
  `error_message` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_priority` (`priority`),
  KEY `idx_ticket_id` (`ticket_id`),
  CONSTRAINT `fk_email_queue_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =============================================
-- Insert default keywords
-- =============================================
INSERT INTO `email_keywords` (`keyword`, `action`, `status_change`, `priority_change`, `auto_response_template`, `notify_admin`, `description`) VALUES
('open', 'reopen_ticket', 'open', NULL, 'ticket_reopened', FALSE, 'Reopens a closed ticket'),
('follow up', 'follow_up', 'follow_up', NULL, 'follow_up_acknowledged', FALSE, 'Marks ticket for follow up'),
('followup', 'follow_up', 'follow_up', NULL, 'follow_up_acknowledged', FALSE, 'Marks ticket for follow up (alternate spelling)'),
('escalate', 'escalate', 'escalated', 'high', 'ticket_escalated', TRUE, 'Escalates ticket to higher priority'),
('urgent', 'escalate', 'escalated', 'urgent', 'ticket_escalated', TRUE, 'Marks ticket as urgent'),
('close', 'close_ticket', 'closed', NULL, 'ticket_closed', FALSE, 'Closes the ticket'),
('closed', 'close_ticket', 'closed', NULL, 'ticket_closed', FALSE, 'Closes the ticket'),
('resolve', 'resolve_ticket', 'resolved', NULL, 'ticket_resolved', FALSE, 'Marks ticket as resolved'),
('resolved', 'resolve_ticket', 'resolved', NULL, 'ticket_resolved', FALSE, 'Marks ticket as resolved'),
('cancel', 'cancel_ticket', 'closed', NULL, 'ticket_cancelled', FALSE, 'Cancels and closes the ticket'),
('add cc', 'add_cc', NULL, NULL, NULL, FALSE, 'Adds CC recipients to ticket'),
('remove cc', 'remove_cc', NULL, NULL, NULL, FALSE, 'Removes CC recipients from ticket');

-- =============================================
-- Insert default email templates
-- =============================================
INSERT INTO `email_templates` (`template_name`, `template_type`, `subject`, `body_html`, `body_plain`, `variables`) VALUES
('ticket_created', 'ticket_created', 'Support Ticket Created: {{ticket_number}} - {{subject}}', 
'<html><body>
<h2>Support Ticket Created</h2>
<p>Dear {{customer_name}},</p>
<p>Your support ticket has been successfully created.</p>
<p><strong>Ticket Number:</strong> {{ticket_number}}<br>
<strong>Subject:</strong> {{subject}}<br>
<strong>Status:</strong> {{status}}<br>
<strong>Priority:</strong> {{priority}}</p>
<p>We will respond to your request as soon as possible. You can reply to this email to add additional information.</p>
<p>Best regards,<br>NU GUI Support Team</p>
</body></html>',
'Support Ticket Created\n\nDear {{customer_name}},\n\nYour support ticket has been successfully created.\n\nTicket Number: {{ticket_number}}\nSubject: {{subject}}\nStatus: {{status}}\nPriority: {{priority}}\n\nWe will respond to your request as soon as possible. You can reply to this email to add additional information.\n\nBest regards,\nNU GUI Support Team',
'["ticket_number", "subject", "status", "priority", "customer_name"]'),

('ticket_escalated', 'escalation', 'Ticket Escalated: {{ticket_number}}', 
'<html><body>
<h2>Ticket Escalated</h2>
<p>Dear {{customer_name}},</p>
<p>Your ticket has been escalated to our senior support team for immediate attention.</p>
<p><strong>Ticket Number:</strong> {{ticket_number}}<br>
<strong>New Priority:</strong> {{priority}}<br>
<strong>Status:</strong> {{status}}</p>
<p>We understand the urgency of your request and will prioritize resolution.</p>
<p>Best regards,<br>NU GUI Support Team</p>
</body></html>',
'Ticket Escalated\n\nDear {{customer_name}},\n\nYour ticket has been escalated to our senior support team for immediate attention.\n\nTicket Number: {{ticket_number}}\nNew Priority: {{priority}}\nStatus: {{status}}\n\nWe understand the urgency of your request and will prioritize resolution.\n\nBest regards,\nNU GUI Support Team',
'["ticket_number", "priority", "status", "customer_name"]'),

('ticket_resolved', 'resolution', 'Ticket Resolved: {{ticket_number}}', 
'<html><body>
<h2>Ticket Resolved</h2>
<p>Dear {{customer_name}},</p>
<p>Your support ticket has been marked as resolved.</p>
<p><strong>Ticket Number:</strong> {{ticket_number}}<br>
<strong>Subject:</strong> {{subject}}</p>
<p>If you need any further assistance or if the issue persists, simply reply to this email with keyword "open" to reopen the ticket.</p>
<p>Thank you for contacting NU GUI Support.</p>
<p>Best regards,<br>NU GUI Support Team</p>
</body></html>',
'Ticket Resolved\n\nDear {{customer_name}},\n\nYour support ticket has been marked as resolved.\n\nTicket Number: {{ticket_number}}\nSubject: {{subject}}\n\nIf you need any further assistance or if the issue persists, simply reply to this email with keyword "open" to reopen the ticket.\n\nThank you for contacting NU GUI Support.\n\nBest regards,\nNU GUI Support Team',
'["ticket_number", "subject", "customer_name"]'),

('follow_up_acknowledged', 'follow_up', 'Follow-up Scheduled: {{ticket_number}}', 
'<html><body>
<h2>Follow-up Scheduled</h2>
<p>Dear {{customer_name}},</p>
<p>We have received your follow-up request for ticket {{ticket_number}}.</p>
<p>Our support team will review your update and respond shortly.</p>
<p>Best regards,<br>NU GUI Support Team</p>
</body></html>',
'Follow-up Scheduled\n\nDear {{customer_name}},\n\nWe have received your follow-up request for ticket {{ticket_number}}.\n\nOur support team will review your update and respond shortly.\n\nBest regards,\nNU GUI Support Team',
'["ticket_number", "customer_name"]');

-- =============================================
-- Create indexes for performance
-- =============================================
-- Note: idx_email_thread already created in tickets table definition (line 51)
CREATE INDEX idx_messages_email_refs ON ticket_messages(email_in_reply_to);
CREATE INDEX idx_queue_processing ON email_queue(status, priority, created_at);

-- =============================================
-- Create view for active tickets summary
-- =============================================
CREATE VIEW active_tickets_summary AS
SELECT 
    t.id,
    t.ticket_number,
    t.subject,
    t.status,
    t.priority,
    t.customer_name,
    t.customer_email,
    t.created_at,
    t.updated_at,
    COUNT(DISTINCT tm.id) as message_count,
    COUNT(DISTINCT tcc.email) as cc_count,
    MAX(tm.created_at) as last_message_at
FROM tickets t
LEFT JOIN ticket_messages tm ON t.id = tm.ticket_id
LEFT JOIN ticket_cc_recipients tcc ON t.id = tcc.ticket_id AND tcc.is_active = 1
WHERE t.status NOT IN ('closed', 'resolved')
GROUP BY t.id;

-- Add composite index for better performance on the active_tickets_summary view
CREATE INDEX idx_tickets_status_id ON tickets(status, id);