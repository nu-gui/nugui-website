<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Support | NuGui<?= $this->endSection() ?>

<?= $this->section('meta_description') ?>Get expert assistance for all your technical needs. Our support team is here to help.<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
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
        color: var(--color-text-secondary);
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
    .btn-primary {
        display: inline-block;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        background-color: var(--color-accent);
        color: white;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: var(--color-accent-hover);
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
<section class="hero-section">
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

        <div class="support-form">
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
                
                <div class="card-grid">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" value="<?= old('name') ?>" required placeholder="John Doe">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="<?= old('email') ?>" required placeholder="john@example.com">
                    </div>
                </div>
                
                <div class="card-grid">
                    <div class="form-group">
                        <label for="product">Product *</label>
                        <select id="product" name="product" required>
                            <option value="">Select a product</option>
                            <option value="NU SIP">NU SIP - VoIP Services</option>
                            <option value="NU SMS">NU SMS - Direct Messaging Services</option>
                            <option value="NU CCS">NU CCS - Telecoms Software Call Control Server</option>
                            <option value="NU DATA">NU DATA - Data Enrichment Services</option>
                            <option value="NU GUI">NU GUI - Graphic User Interface Development</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="priority">Priority *</label>
                        <select id="priority" name="priority" required>
                            <option value="Low">Low - General inquiry</option>
                            <option value="Medium" selected>Medium - Service affecting</option>
                            <option value="High">High - Critical issue</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="issue">Issue Summary *</label>
                    <input type="text" id="issue" name="issue" value="<?= old('issue') ?>" required placeholder="Brief description of your issue">
                </div>
                
                <div class="form-group">
                    <label for="message">Detailed Description *</label>
                    <textarea id="message" name="message" rows="6" required placeholder="Please provide as much detail as possible about your issue..."><?= old('message') ?></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn-primary">Submit Support Request</button>
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
                <a href="#" style="color: var(--color-accent); font-weight: 600;">View Docs →</a>
            </div>
            
            <div class="support-card">
                <h3>Live Chat</h3>
                <p>Chat with our support team during business hours.</p>
                <a href="#" style="color: var(--color-accent); font-weight: 600;">Start Chat →</a>
            </div>
            
            <div class="support-card">
                <h3>Community Forum</h3>
                <p>Get help from our community of users and experts.</p>
                <a href="#" style="color: var(--color-accent); font-weight: 600;">Visit Forum →</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>