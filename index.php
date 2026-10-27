<?php
/**
 * ============================================================================
 * LEQs-AWD : HandySense Smart Farming
 * นวัตกรรมตรวจวัดระดับน้ำและคาร์บอนเครดิตภาคเกษตร
 * Faculty of Science & Technology, Rambhai Barni Rajabhat University
 * Co-developed with Praneetwittayakhom School & Regional Agricultural Networks
 * ============================================================================
 * Architecture: Clean Modular Components Architecture
 * Standardized with edge-xaiot-agrienvi Portal Design System
 * ============================================================================
 */

$page_title = "LEQs-AWD : HandySense Smart Farming — นวัตกรรมตรวจวัดระดับน้ำและคาร์บอนเครดิตภาคเกษตร | RBRU 2026";

// Load Dynamic Site Content JSON
$site_content_file = __DIR__ . '/data/site_content.json';
$site_content = file_exists($site_content_file) ? json_decode(file_get_contents($site_content_file), true) : [];

// 1. HTML Head & Global Assets
require_once __DIR__ . '/includes/header.php';

// 2. Navigation Bar (Top Sticky Glassmorphism with Academic Ribbon)
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ========================================================================= -->
<!-- MAIN PORTAL CONTENT WRAPPER                                               -->
<!-- ========================================================================= -->
<main class="container mx-auto max-w-7xl 2xl:max-w-[1400px] px-3 sm:px-4 md:px-6 pt-24 md:pt-28 pb-28 sm:pb-16 space-y-16 md:space-y-24 w-full overflow-x-hidden min-w-0">

    <?php
    // 3. Hero Section (Overview & Quick Telemetry Metrics)
    require_once __DIR__ . '/includes/hero.php';

    // 4. Learning Journey Stepper (Active Learning 5 Steps)
    require_once __DIR__ . '/includes/section_stepper.php';

    // 5. Conceptual Framework (L-E-Q-S-AWD Architecture)
    require_once __DIR__ . '/includes/section_framework.php';

    // 6. 3 Core Systems (LEQs-AWD Smart Rice, Durian VPD, Envi 4 Spheres)
    require_once __DIR__ . '/includes/section_systems.php';

    // 7. Interactive Virtual Simulator (ESP32-S3 ATD3.5 Live Lab & Sonar Synth)
    require_once __DIR__ . '/includes/section_simulator.php';

    // 8. ESP32-S3 ATD3.5 4-Screens Showcase
    require_once __DIR__ . '/includes/section_screens.php';

    // 9. Bill of Materials & Procurement Guide (Real Thai Pricing & Suppliers)
    require_once __DIR__ . '/includes/section_bom.php';

    // 10. Carbon Credit & ROI Calculator
    require_once __DIR__ . '/includes/section_calculator.php';

    // 11. Project Researchers & Instructors (LEQs Teams)
    require_once __DIR__ . '/includes/section_teams.php';

    // 12. Frequently Asked Questions (FAQ)
    require_once __DIR__ . '/includes/section_faq.php';

    // 13. Official Project Documents & Downloads
    require_once __DIR__ . '/includes/section_documents.php';
    ?>

</main>

<?php
// 14. Global High-Contrast Footer
require_once __DIR__ . '/includes/footer.php';

// 15. Mobile App Bottom Navigation Bar (Bangchak Style Curve)
require_once __DIR__ . '/includes/bottom_nav.php';

// 16. Modals, Floating AI Assistant (น้อง iLEQs 🤖) & Dynamic Scripts
require_once __DIR__ . '/includes/modals.php';
?>
