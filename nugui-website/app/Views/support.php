<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="support">
        <h2>Support</h2>
        <p>If you need support, please fill out the form below.</p>

        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger">
                <?= session()->get('errors') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->get('success')): ?>
            <div class="alert alert-success">
                <?= session()->get('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/submit_support_form') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            </div>
            <div class="form-group">
                <label for="product">Product</label>
                <select name="product" id="product" required>
                    <option value="NU GUI">NU GUI - Graphic User Interface Development</option>
                    <option value="NU SIP">NU SIP - VoIP Services</option>
                    <option value="NU SMS">NU SMS - Direct Messaging Services</option>
                    <option value="NU CCS">NU CCS - Telecoms Software Call Control Server</option>
                    <option value="NU DATA">NU DATA - Data Enrichment Services</option>
                </select>
            </div>
            <div class="form-group">
                <label for="issue">Issue</label>
                <input type="text" name="issue" id="issue" value="<?= old('issue') ?>" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" required><?= old('message') ?></textarea>
            </div>
            <div class="button-wrapper">
                <button type="submit">Send Support Request</button>
            </div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
