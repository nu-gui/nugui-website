<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Apple-Style Products Hero -->
<section class="hero-section" style="padding-top: calc(44px + var(--spacing-5xl)); background: linear-gradient(135deg, var(--color-background) 0%, var(--color-background-secondary) 100%);">
    <div class="container" style="max-width: 980px; text-align: center; padding: var(--spacing-5xl) var(--spacing-lg);">
        <h1 style="font-family: var(--font-family-display); font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-lg); line-height: 1.1;">
            Our Products
        </h1>
        <p style="font-size: var(--font-size-xl); color: var(--color-text-secondary); margin-bottom: var(--spacing-3xl); max-width: 680px; margin-left: auto; margin-right: auto; line-height: var(--line-height-relaxed);">
            Discover innovative telecommunications solutions designed to enhance your business operations and drive growth in the digital era.
        </p>
    </div>
</section>

<!-- Product Grid -->
<section style="padding: var(--spacing-5xl) 0; background: var(--color-background);">
    <div class="container" style="max-width: 1024px;">
        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-3xl);">
            
            <!-- NU SIP Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU SIP
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Advanced VoIP Services
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    NU SIP offers advanced VoIP services designed to streamline your business communications. Enjoy crystal-clear voice quality, reliable connectivity, and features that enhance productivity.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Advanced Proxy Interconnect
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Enhanced RTP Media Interconnect
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Advanced DID Database Management
                    </li>
                </ul>
                <a href="/solutions#nu-sip" 
                   style="display: inline-flex; align-items: center; padding: var(--spacing-sm) var(--spacing-lg); background: var(--color-primary); color: white; text-decoration: none; border-radius: var(--border-radius); font-weight: 500; transition: all var(--transition-base);"
                   onmouseover="this.style.background='var(--color-primary-hover)'"
                   onmouseout="this.style.background='var(--color-primary)'">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU SMS Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-success), #4ade80); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU SMS
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Direct Messaging Services
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    NU SMS provides comprehensive direct messaging services that enable businesses to communicate effectively with their customers through reliable SMS delivery.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Bulk SMS Services
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Automated Messaging
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Real-time Delivery Tracking
                    </li>
                </ul>
                <a href="/solutions#nu-sms" 
                   style="display: inline-flex; align-items: center; padding: var(--spacing-sm) var(--spacing-lg); background: var(--color-success); color: white; text-decoration: none; border-radius: var(--border-radius); font-weight: 500; transition: all var(--transition-base);"
                   onmouseover="this.style.background='#16a34a'"
                   onmouseout="this.style.background='var(--color-success)'">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU CCS Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-secondary), #8b5cf6); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU CCS
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Call Control Server
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    NU CCS provides advanced call control and routing capabilities for telecommunications providers, enabling efficient call management and billing.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Advanced Call Routing
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Real-time Billing
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Traffic Management
                    </li>
                </ul>
                <a href="/solutions#nu-ccs" 
                   style="display: inline-flex; align-items: center; padding: var(--spacing-sm) var(--spacing-lg); background: var(--color-secondary); color: white; text-decoration: none; border-radius: var(--border-radius); font-weight: 500; transition: all var(--transition-base);"
                   onmouseover="this.style.background='#7c3aed'"
                   onmouseout="this.style.background='var(--color-secondary)'">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- NU DATA Product -->
            <div class="product-card" style="background: var(--color-surface); border-radius: var(--border-radius-lg); padding: var(--spacing-2xl); box-shadow: var(--shadow-sm); transition: all var(--transition-base);" 
                 onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='var(--shadow-lg)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow-sm)'">
                <div style="text-align: center; margin-bottom: var(--spacing-xl);">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--color-warning), #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--spacing-lg);">
                        <svg width="40" height="40" fill="white" viewBox="0 0 24 24">
                            <path d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-family-display); font-size: var(--font-size-xl); font-weight: 600; color: var(--color-text-primary); margin-bottom: var(--spacing-sm);">
                        NU DATA
                    </h3>
                    <p style="color: var(--color-text-secondary); margin-bottom: var(--spacing-lg);">
                        Data Enrichment Services
                    </p>
                </div>
                <p style="color: var(--color-text-secondary); line-height: var(--line-height-relaxed); margin-bottom: var(--spacing-lg);">
                    NU DATA offers state-of-the-art data enrichment services that help businesses enhance their data quality and gain valuable insights for better decision making.
                </p>
                <ul style="list-style: none; padding: 0; margin-bottom: var(--spacing-xl);">
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Data Cleansing & Validation
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Phone Number Verification
                    </li>
                    <li style="color: var(--color-text-secondary); margin-bottom: var(--spacing-xs); display: flex; align-items: center;">
                        <span style="color: var(--color-success); margin-right: var(--spacing-sm);">✓</span>
                        Right Party Contact (RPC)
                    </li>
                </ul>
                <a href="/solutions#nu-data" 
                   style="display: inline-flex; align-items: center; padding: var(--spacing-sm) var(--spacing-lg); background: var(--color-warning); color: white; text-decoration: none; border-radius: var(--border-radius); font-weight: 500; transition: all var(--transition-base);"
                   onmouseover="this.style.background='#d97706'"
                   onmouseout="this.style.background='var(--color-warning)'">
                    Learn More
                    <svg width="16" height="16" style="margin-left: var(--spacing-xs);" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section style="padding: var(--spacing-5xl) 0; background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-hover) 100%);">
    <div class="container" style="max-width: 680px; text-align: center;">
        <h2 style="font-family: var(--font-family-display); font-size: var(--font-size-3xl); font-weight: 600; color: white; margin-bottom: var(--spacing-lg);">
            Ready to Transform Your Business?
        </h2>
        <p style="font-size: var(--font-size-lg); color: rgba(255, 255, 255, 0.9); margin-bottom: var(--spacing-2xl); line-height: var(--line-height-relaxed);">
            Discover how our products can streamline your operations and drive growth. Contact our team to learn more about our solutions.
        </p>
        <div style="display: flex; gap: var(--spacing-lg); justify-content: center; flex-wrap: wrap;">
            <a href="/contact" 
               style="display: inline-flex; align-items: center; padding: var(--spacing-md) var(--spacing-xl); background: white; color: var(--color-primary); text-decoration: none; border-radius: var(--border-radius); font-weight: 600; transition: all var(--transition-base);"
               onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.2)'"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                Contact Sales
            </a>
            <a href="/partner-program" 
               style="display: inline-flex; align-items: center; padding: var(--spacing-md) var(--spacing-xl); background: transparent; color: white; text-decoration: none; border: 2px solid white; border-radius: var(--border-radius); font-weight: 600; transition: all var(--transition-base);"
               onmouseover="this.style.background='white'; this.style.color='var(--color-primary)'"
               onmouseout="this.style.background='transparent'; this.style.color='white'">
                Partner Program
            </a>
        </div>
    </div>
</section>

<!-- Responsive Styles -->
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
    .btn-primary {
        display: inline-block;
        padding: 15px 40px;
        border-radius: 999px;
        font-size: 1.15rem;
        font-weight: 600;
        text-decoration: none;
        background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
        color: #18181A;
        box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        transition: background 0.3s, color 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        color: #fff;
    }
@media (max-width: 768px) {
    .product-grid {
        grid-template-columns: 1fr !important;
        gap: var(--spacing-xl) !important;
    }
    
    .product-card {
        text-align: center;
    }
}
</style>

<?= $this->endSection() ?>
