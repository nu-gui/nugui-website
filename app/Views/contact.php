<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="contact-us">
        <h2>Contact Us</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/submit_contact_form') ?>" method="post">
            <?= csrf_field() ?>
            
            <!-- Honeypot fields - hidden from users but visible to bots -->
            <div style="display:none;">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
                <input type="text" name="phone" tabindex="-1" autocomplete="off">
                <input type="email" name="email_verify" tabindex="-1" autocomplete="off">
            </div>
            
            <!-- Time-based validation -->
            <input type="hidden" name="form_start_time" value="<?= time() ?>">
            <input type="hidden" name="form_token" value="<?= md5(uniqid() . session_id()) ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" value="<?= old('subject') ?>" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" required><?= old('message') ?></textarea>
            </div>
            <div class="button-wrapper">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
