<?php
/**
 * LEQs-AWD : HandySense Smart Farming
 * นวัตกรรมตรวจวัดระดับน้ำและคาร์บอนเครดิตภาคเกษตร
 * Faculty of Science & Technology, Rambhai Barni Rajabhat University
 * Co-developed with Praneetwittayakhom School & Regional Agricultural Networks
 */
if (!isset($page_title)) {
    $page_title = "LEQs-AWD : HandySense Smart Farming — นวัตกรรมตรวจวัดระดับน้ำและคาร์บอนเครดิตภาคเกษตร | RBRU 2026";
}
?>
<!DOCTYPE html>
<html lang="th" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, viewport-fit=cover">
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Mobile Web App & PWA Settings -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="LEQs-AWD">
    <meta name="theme-color" content="#059669">
    <meta name="application-name" content="LEQs-AWD Smart Farming">
    <link rel="apple-touch-icon" href="assets/images/nong_ileqs.png">
    <link rel="icon" type="image/png" href="assets/images/nong_ileqs.png">
    
    <!-- Google Fonts: Sarabun, Kanit, Outfit, JetBrains Mono, Chakra Petch, Orbitron -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Kanit:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&family=Chakra+Petch:wght@400;500;600;700&family=Orbitron:wght@400;600;700;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS (Academic Design System & Glassmorphism) -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom Scripts -->
    <script src="assets/js/app.js" defer></script>
</head>
<body class="hero-bg text-slate-800 antialiased font-sans selection:bg-emerald-500 selection:text-white">
