<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="top-border"></div>
<div class="main-content">
    <section class="our-story container">
        <h2>Our Story</h2>
        <p>Welcome to NU GUI.</p>
        <div class="parallax">
            <img src="<?= base_url('assets/images/our-story.jpg') ?>" alt="Image representing our story">
        </div>
        <p>NU GUI has a rich history of delivering outstanding digital experiences. Our journey began with a simple idea: to create user interfaces that make technology more accessible and enjoyable for everyone. Today, we continue to innovate and push the boundaries of what's possible in UI/UX design.</p>
    </section>

    <section class="about-overview container">
        <h2>About NU GUI</h2>
        <p>NU GUI was founded with the vision of transforming the way users interact with technology. We believe that great design is at the heart of every successful digital product, and our team of expert designers and developers is dedicated to creating interfaces that are not only visually stunning but also highly functional and user-friendly.</p>
        <p><strong>Our Vision:</strong> We envision a world where technology seamlessly integrates with daily life through intuitive and beautiful user interfaces.</p>
        <p><strong>Our Mission:</strong> Our mission is to deliver top-notch UI/UX designs that not only meet but exceed our clients' expectations.</p>
        <p><strong>Our Values:</strong> Innovation, Quality, Customer Satisfaction, Integrity.</p>
    </section>

    <section class="our-team container">
        <h2>Our Team</h2>
        <p>Meet the passionate and talented individuals behind NU GUI.</p>
        <div class="team-grid">
            <div class="team-member">
                <img src="<?= base_url('assets/images/wes-profile.jpg') ?>" alt="Profile picture of Wes, CEO and Founder of NU GUI">
                <div class="team-info">
                    <h3>Wes</h3>
                    <p>CEO & Founder</p>
                    <p>Wes is the visionary founder and CEO of NU GUI. With a passion for innovative design and user experience, Wes leads the team in creating stunning and functional interfaces that set new standards in the industry.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/suren-profile.jpg') ?>" alt="Profile picture of Suren, CTO of NU GUI">
                <div class="team-info">
                    <h3>Suren</h3>
                    <p>CTO</p>
                    <p>Suren, our CTO, brings extensive technical expertise to the team. He oversees all technological developments at NU GUI, ensuring that our solutions are cutting-edge and reliable.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/gali-profile.jpg') ?>" alt="Profile picture of Gali, Senior Executive Assistant at NU GUI">
                <div class="team-info">
                    <h3>Gali</h3>
                    <p>Sr Executive Assistant</p>
                    <p>Gali is the Senior Executive Assistant at NU GUI. With exceptional organizational skills and attention to detail, she ensures that all executive operations run smoothly and efficiently.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/pavan-profile.jpg') ?>" alt="Profile picture of Pavan, Junior Full Stack Developer at NU GUI">
                <div class="team-info">
                    <h3>Pavan</h3>
                    <p>Jr Full Stack Developer</p>
                    <p>Pavan is a Junior Full Stack Developer at NU GUI. He brings fresh perspectives and innovative ideas to the team, contributing to the development of our dynamic web solutions.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/ajay-profile.jpg') ?>" alt="Profile picture of Ajay, Senior Full Stack Developer at NU GUI">
                <div class="team-info">
                    <h3>Ajay</h3>
                    <p>Sr Full Stack Developer</p>
                    <p>Ajay is a Senior Full Stack Developer with a wealth of experience in both front-end and back-end development. His expertise ensures that our applications are robust and user-friendly.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/ankit-profile.jpg') ?>" alt="Profile picture of Ankit, UI/UX Web Designer at NU GUI">
                <div class="team-info">
                    <h3>Ankit</h3>
                    <p>UI UX Web Designer</p>
                    <p>Ankit is our UI/UX Web Designer who crafts visually appealing and highly functional designs. His work enhances user experience and ensures our interfaces are intuitive and engaging.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="<?= base_url('assets/images/mihir-profile.jpg') ?>" alt="Profile picture of Mihir, Project Manager and Full Stack Developer at NU GUI">
                <div class="team-info">
                    <h3>Mihir</h3>
                    <p>PM & Full Stack Developer</p>
                    <p>Mihir serves as both a Project Manager and Full Stack Developer. His dual role helps bridge the gap between project planning and execution, ensuring timely and successful project completions.</p>
                </div>
            </div>
        </div>
        <div class="button-wrapper">
            <button><a href="#">Discover Our Journey</a></button>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
