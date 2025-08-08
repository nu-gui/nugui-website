<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Support | NuGui<?= $this->endSection() ?>

<?= $this->section('meta_description') ?>Get expert assistance for all your technical needs. Our support team is here to help.<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    body {
        background: var(--color-background);
        color: var(--color-text-primary);
        font-family: var(--font-family-primary);
        margin: 0;
        padding: 0;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--color-primary);
        letter-spacing: -0.01em;
    }
    /* Custom styles for the support page to align with the Apple design system */
    .hero-section {
        background-color: var(--color-background);
        color: var(--color-text-primary);
        text-align: center;
        padding: 80px 20px;
    }
    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: -0.02em;
        color: #FFFFFF; /* White text for main heading */
    }
    .hero-section .text-gradient {
        background: -webkit-linear-gradient(45deg, var(--color-accent), var(--color-accent-secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hero-section p {
        font-size: 1.5rem;
        max-width: 48rem;
        margin: 0 auto 30px;
        color: #FFFFFF; /* White text for description */
        opacity: 0.9;
    }
    .section {
        padding: 80px 20px;
        background-color: var(--color-background-secondary);
    }
    .section.alt {
        background-color: var(--color-background);
    }
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-header h2 {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .section-header p {
        font-size: 1.2rem;
        max-width: 42rem;
        margin: 0 auto;
        color: var(--color-text-secondary);
    }
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }
    .support-card {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .support-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .support-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    .support-card p {
        color: var(--color-text-secondary);
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .support-form {
        background-color: var(--color-background);
        border-radius: 20px;
        padding: 40px;
        max-width: 56rem;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--color-text-primary);
    }
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--color-border);
        border-radius: 10px;
        background-color: var(--color-background-secondary);
        color: var(--color-text-primary);
        font-size: 1rem;
    }
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--color-accent);
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
    .max-w-7xl {
        max-width: 80rem;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    @media (min-width: 640px) {
        .max-w-7xl {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 1024px) {
        .max-w-7xl {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section hero-support">
    <div class="max-w-7xl">
        <h1>
            Support <span class="text-gradient">Center</span>
        </h1>
        <p>
            Get expert assistance for all your technical needs. Our support team is here to help.
        </p>
    </div>
</section>

<!-- Support Form Section -->
<section class="section">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Submit Support Request</h2>
            <p>Our expert team is ready to assist you with any technical challenges</p>
        </div>
        <?php if (session()->get('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"><?= session()->get('success') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->get('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline"><?= is_array(session()->get('errors')) ? implode(', ', session()->get('errors')) : session()->get('errors') ?></span>
            </div>
        <?php endif; ?>

        <div class="support-form futuristic-form">
            <form action="<?= base_url('/submit_support_form') ?>" method="post">
                <?= csrf_field() ?>
                
                <!-- Honeypot fields -->
                <div class="hidden">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                    <input type="text" name="company_name" tabindex="-1" autocomplete="off">
                    <input type="email" name="backup_email" tabindex="-1" autocomplete="off">
                </div>
                
                <!-- Time-based validation -->
                <input type="hidden" name="form_start_time" value="<?= time() ?>">
                <input type="hidden" name="form_token" value="<?= bin2hex(random_bytes(16)) ?>">
                
                <!-- Contact Information Section -->
                <div class="form-section-title">Contact Information</div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_name">Your Name</label>
                        <input type="text" id="support_name" name="name" value="<?= old('name') ?>" required placeholder="John Doe">
                    </div>
                </div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_email">Email Address</label>
                        <input type="email" id="support_email" name="email" value="<?= old('email') ?>" required placeholder="john@example.com">
                    </div>
                </div>
                
                <!-- Support Details Section -->
                <div class="form-section-title">Support Details</div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_product">Product</label>
                        <select id="support_product" name="product" required>
                            <option value="">Select a product</option>
                            <option value="NU SIP">NU SIP - VoIP Services</option>
                            <option value="NU SMS">NU SMS - Direct Messaging Services</option>
                            <option value="NU CCS">NU CCS - Call Control Server</option>
                            <option value="NU DATA">NU DATA - Data Services</option>
                            <option value="NU GUI">NU GUI - Interface Development</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_priority">Priority</label>
                        <select id="support_priority" name="priority" required>
                            <option value="Low">Low - General inquiry</option>
                            <option value="Medium" selected>Medium - Service affecting</option>
                            <option value="High">High - Critical issue</option>
                        </select>
                    </div>
                </div>
                
                <!-- Issue Description Section -->
                <div class="form-section-title">Issue Description</div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_issue">Issue Summary</label>
                        <input type="text" id="support_issue" name="issue" value="<?= old('issue') ?>" required placeholder="Brief description of your issue">
                    </div>
                </div>
                
                <div class="form-row single">
                    <div class="form-group">
                        <label for="support_message">Detailed Description</label>
                        <textarea id="support_message" name="message" rows="5" required placeholder="Please provide as much detail as possible about your issue..."><?= old('message') ?></textarea>
                    </div>
                </div>
                
                <div class="form-submit">
                    <button type="submit" class="btn btn--primary btn--large">Submit Support Request</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Support Information -->
<section class="section alt">
    <div class="max-w-7xl">
        <div class="section-header">
            <h2>Additional Support Options</h2>
            <p>
                Need immediate assistance? Here are other ways to reach our support team.
            </p>
        </div>
        
        <div class="card-grid">
            <div class="support-card">
                <h3>Documentation</h3>
                <p>Browse our comprehensive documentation and guides.</p>
                <a href="#" onclick="showComingSoon('Documentation')" style="color: var(--color-accent); font-weight: 600;">View Docs →</a>
            </div>
            
            <div class="support-card">
                <h3>Live Chat</h3>
                <p>Chat with our support team during business hours.</p>
                <a href="https://wa.me/27211100555" target="_blank" rel="noopener noreferrer" style="color: var(--color-accent); font-weight: 600;">Start Chat →</a>
            </div>
            
            <div class="support-card">
                <h3>Community Forum</h3>
                <p>Get help from our community of users and experts.</p>
                <a href="#" onclick="showComingSoon('Community Forum')" style="color: var(--color-accent); font-weight: 600;">Visit Forum →</a>
            </div>
        </div>
    </div>
</section>

<!-- Coming Soon Popup -->
<div id="comingSoonPopup" class="coming-soon-popup" style="display: none;">
    <div class="coming-soon-content">
        <div class="coming-soon-icon">🚧</div>
        <h3 id="comingSoonTitle">Coming Soon</h3>
        <p id="comingSoonMessage">This feature is currently under development and will be available soon.</p>
        <button onclick="hideComingSoon()" class="btn btn--primary">Got it!</button>
    </div>
</div>

<style>
/* Coming Soon Popup Styles */
.coming-soon-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(5px);
    animation: fadeIn 0.3s ease;
}

.coming-soon-content {
    background: var(--color-background);
    border-radius: 20px;
    padding: 40px;
    max-width: 400px;
    margin: 20px;
    text-align: center;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(0, 162, 232, 0.2);
    animation: slideUp 0.3s ease;
}

.coming-soon-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    display: block;
}

.coming-soon-content h3 {
    color: var(--color-text-primary);
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.coming-soon-content p {
    color: var(--color-text-secondary);
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 25px;
}

.coming-soon-content .btn {
    margin: 0 auto;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    to { 
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* Dark theme adjustments */
@media (prefers-color-scheme: dark) {
    .coming-soon-content {
        background: var(--color-background);
        border-color: rgba(90, 180, 241, 0.3);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
    }
}
</style>

<script>
function showComingSoon(feature) {
    const popup = document.getElementById('comingSoonPopup');
    const title = document.getElementById('comingSoonTitle');
    const message = document.getElementById('comingSoonMessage');
    
    // Customize message based on feature
    if (feature === 'Documentation') {
        title.textContent = 'Documentation Coming Soon';
        message.textContent = 'Our comprehensive documentation portal is currently being developed. In the meantime, feel free to contact us directly for any technical questions!';
    } else if (feature === 'Community Forum') {
        title.textContent = 'Community Forum Coming Soon';
        message.textContent = 'We\'re building an amazing community space where users can share knowledge and get help from experts. Stay tuned!';
    } else {
        title.textContent = 'Coming Soon';
        message.textContent = 'This feature is currently under development and will be available soon.';
    }
    
    popup.style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function hideComingSoon() {
    const popup = document.getElementById('comingSoonPopup');
    popup.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore scrolling
}

// Close popup when clicking outside the content
document.getElementById('comingSoonPopup').addEventListener('click', function(e) {
    if (e.target === this) {
        hideComingSoon();
    }
});

// Close popup on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideComingSoon();
    }
});
</script>

<?= $this->endSection() ?>