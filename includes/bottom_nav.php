    <!-- ========================================================================= -->
    <!-- 14. SMARTPHONE 5-MENU BOTTOM NAVIGATION BAR (3D CONVEX DOME & 3D ICONS)    -->
    <!-- Designed following RBRU LEQs Smart Farm Design System Standards           -->
    <!-- ========================================================================= -->
    <nav id="mobileBottomNav" class="md:hidden fixed bottom-0 inset-x-0 z-50 pointer-events-auto select-none w-full max-w-[100vw] overflow-visible" style="padding-bottom: max(env(safe-area-inset-bottom, 0px), 4px);">
        
        <!-- 3D Curved Scoop Background with Molded Recessed Dish (Zero Page Bleed-Through) -->
        <div class="absolute bottom-0 inset-x-0 w-full h-[76px] sm:h-[80px] pointer-events-none">
            
            <!-- Solid Base Shield (blocks 100% of scrolling page content) -->
            <div class="absolute inset-0 bg-white shadow-[0_-10px_35px_rgba(0,0,0,0.08)]"></div>

            <!-- 3D Curved Notch SVG Overlay with Sculpted Concave Dish -->
            <svg class="absolute -top-3 w-full h-[88px] sm:h-[92px] filter drop-shadow-[0_-6px_16px_rgba(0,0,0,0.07)]" viewBox="0 0 375 90" preserveAspectRatio="none">
                <defs>
                    <!-- 3D Bar Surface Gradient -->
                    <linearGradient id="barGradient3D" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#ffffff" />
                        <stop offset="35%" stop-color="#ffffff" />
                        <stop offset="100%" stop-color="#f8fafc" />
                    </linearGradient>

                    <!-- 3D Concave Scoop Dish Gradient -->
                    <radialGradient id="scoopDish3D" cx="50%" cy="30%" r="65%">
                        <stop offset="0%" stop-color="#f1f5f9" stop-opacity="0.9" />
                        <stop offset="60%" stop-color="#e2e8f0" stop-opacity="0.6" />
                        <stop offset="100%" stop-color="#cbd5e1" stop-opacity="0.3" />
                    </radialGradient>

                    <!-- 3D Rim Highlight Line -->
                    <linearGradient id="rimStroke3D" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#e2e8f0" />
                        <stop offset="35%" stop-color="#cbd5e1" />
                        <stop offset="50%" stop-color="#94a3b8" />
                        <stop offset="65%" stop-color="#cbd5e1" />
                        <stop offset="100%" stop-color="#e2e8f0" />
                    </linearGradient>
                </defs>

                <!-- Molded 3D Concave Dish Backing (under the scoop) -->
                <ellipse cx="187.5" cy="20" rx="42" ry="20" fill="url(#scoopDish3D)" />

                <!-- Main Sculpted Curved Bar Body -->
                <path d="M0,12 
                         L134,12 
                         C146,12 153,46 187.5,46 
                         C222,46 229,12 241,12 
                         L375,12 
                         L375,90 
                         L0,90 Z" 
                      fill="url(#barGradient3D)" 
                      stroke="url(#rimStroke3D)" 
                      stroke-width="1.2" />

                <!-- Subtle Inner Scoop Shadow Curve for high-end depth -->
                <path d="M136,13 C148,13 155,47 187.5,47 C220,47 227,13 239,13" 
                      fill="none" 
                      stroke="rgba(0,0,0,0.06)" 
                      stroke-width="1.5" />
            </svg>
        </div>

        <!-- 5 Interactive Navigation Tabs Container -->
        <div class="relative z-10 flex justify-around items-end h-[74px] sm:h-[78px] px-1 sm:px-2 pb-1.5 w-full max-w-lg mx-auto">
            
            <!-- ================================================================= -->
            <!-- MENU 1: หน้าแรก / ภาพรวม (Overview - 3D Emerald Orb)               -->
            <!-- ================================================================= -->
            <a href="#hero" 
               id="navItemHome"
               class="flex flex-col items-center justify-center w-14 group transition-transform active:scale-90">
                <!-- 3D Claymorphic Icon Button -->
                <div class="icon-3d-box icon-3d-emerald relative group-hover:scale-105">
                    <div class="icon-3d-gloss"></div>
                    <i class="fa-solid fa-house text-white text-sm sm:text-base drop-shadow-[0_2px_3px_rgba(0,0,0,0.35)]"></i>
                </div>
                <span class="text-[10px] sm:text-[10.5px] font-bold text-emerald-800 mt-1 tracking-tight">หน้าแรก</span>
                <span class="nav-dot w-1.5 h-1.5 rounded-full bg-emerald-600 mt-0.5 opacity-100 transition-opacity"></span>
            </a>

            <!-- ================================================================= -->
            <!-- MENU 2: อุปกรณ์จัดซื้อ & ราคา (BOM - 3D Amber Orb)                 -->
            <!-- ================================================================= -->
            <a href="#bom" 
               id="navItemBom"
               class="flex flex-col items-center justify-center w-14 group transition-transform active:scale-90">
                <!-- 3D Claymorphic Icon Button -->
                <div class="icon-3d-box icon-3d-amber relative group-hover:scale-105">
                    <div class="icon-3d-gloss"></div>
                    <i class="fa-solid fa-cart-shopping text-white text-sm sm:text-base drop-shadow-[0_2px_3px_rgba(0,0,0,0.35)]"></i>
                </div>
                <span class="text-[10px] sm:text-[10.5px] font-semibold text-slate-600 group-hover:text-amber-700 mt-1 tracking-tight">จัดซื้อ BOM</span>
                <span class="nav-dot w-1.5 h-1.5 rounded-full bg-amber-600 mt-0.5 opacity-0 transition-opacity"></span>
            </a>

            <!-- ================================================================= -->
            <!-- MENU 3 (CENTER): ดูข้อมูลเซนเซอร์ (3D CONVEX FLOATING DOME)          -->
            <!-- โค้งนูนเด่นชัด: เปิดดู Telemetry เซนเซอร์สนาม (Sim + Real Sensor) -->
            <!-- ================================================================= -->
            <div class="relative flex flex-col items-center justify-center -top-4 sm:-top-5 z-30">
                <!-- Outer 3D Convex Dome Mound -->
                <button onclick="openSensorDataModal()" 
                        class="center-3d-dome group relative"
                        title="คลิกเพื่อดูข้อมูลและสถานะเซนเซอร์แบบเรียลไทม์ (Simulation &amp; Real Sensor Ready)">
                    <!-- 3D Specular Highlight Glare -->
                    <div class="center-3d-glare"></div>
                    <!-- Live Pulsing Sensor Wave Ring -->
                    <span class="absolute -inset-1 rounded-full bg-teal-400/30 animate-ping pointer-events-none"></span>
                    <!-- 3D Icon: Sensor Broadcast / Waves -->
                    <div class="flex flex-col items-center justify-center text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.4)] group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-tower-broadcast text-lg sm:text-xl"></i>
                    </div>
                </button>
                <!-- 3D Floating Pill Badge -->
                <button onclick="openSensorDataModal()" class="px-2.5 py-0.5 rounded-full bg-gradient-to-r from-teal-700 via-emerald-700 to-teal-800 text-white text-[9.5px] sm:text-[10px] font-bold shadow-[0_2px_8px_rgba(13,148,136,0.4)] border border-teal-300/40 mt-1 whitespace-nowrap leading-tight tracking-tight hover:scale-105 active:scale-95 transition-all">
                    ข้อมูลเซนเซอร์
                </button>
            </div>

            <!-- ================================================================= -->
            <!-- MENU 4: คำนวณคาร์บอน & ROI (Calculator - 3D Purple Orb)            -->
            <!-- ================================================================= -->
            <a href="#calculator" 
               id="navItemCalc"
               class="flex flex-col items-center justify-center w-14 group transition-transform active:scale-90">
                <!-- 3D Claymorphic Icon Button -->
                <div class="icon-3d-box icon-3d-purple relative group-hover:scale-105">
                    <div class="icon-3d-gloss"></div>
                    <i class="fa-solid fa-calculator text-white text-sm sm:text-base drop-shadow-[0_2px_3px_rgba(0,0,0,0.35)]"></i>
                </div>
                <span class="text-[10px] sm:text-[10.5px] font-semibold text-slate-600 group-hover:text-purple-700 mt-1 tracking-tight">คำนวณ ROI</span>
                <span class="nav-dot w-1.5 h-1.5 rounded-full bg-purple-600 mt-0.5 opacity-0 transition-opacity"></span>
            </a>

            <!-- ================================================================= -->
            <!-- MENU 5: คณะผู้วิจัย & เอกสาร (Teams & Docs - 3D Blue Orb)          -->
            <!-- ================================================================= -->
            <a href="#teams" 
               id="navItemTeams"
               class="flex flex-col items-center justify-center w-14 group transition-transform active:scale-90">
                <!-- 3D Claymorphic Icon Button -->
                <div class="icon-3d-box icon-3d-blue relative group-hover:scale-105">
                    <div class="icon-3d-gloss"></div>
                    <i class="fa-solid fa-user-group text-white text-sm sm:text-base drop-shadow-[0_2px_3px_rgba(0,0,0,0.35)]"></i>
                </div>
                <span class="text-[10px] sm:text-[10.5px] font-semibold text-slate-600 group-hover:text-blue-700 mt-1 tracking-tight">ทีมวิจัย</span>
                <span class="nav-dot w-1.5 h-1.5 rounded-full bg-blue-600 mt-0.5 opacity-0 transition-opacity"></span>
            </a>

        </div>
    </nav>
