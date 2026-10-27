    <!-- ========================================================================= -->
    <!-- 3. LEARNING JOURNEY STEPPER (ACADEMIC OBE & ACTIVE LEARNING CYCLE)        -->
    <!-- ========================================================================= -->
    <section id="stepper" class="space-y-6 scroll-mt-28">
        
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider font-mono">
                <i class="fa-solid fa-stairs text-emerald-600 mr-1"></i> Active Learning &amp; Field Practice
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-heading font-extrabold text-gray-900 tracking-tight">
                5 ขั้นตอนการปฏิบัติการจัดการน้ำเปียกสลับแห้ง (AWD)
            </h2>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                กระบวนการเรียนรู้และลงมือทำจริงในแปลงนาของชุมชน ตั้งแต่การเตรียมอุปกรณ์ไปจนถึงการวัดคาร์บอนเครดิต
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5 sm:gap-4">
            
            <!-- Step 1 -->
            <div class="glass-card p-5 rounded-2xl border-t-4 border-emerald-500 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-full bg-emerald-600 text-white font-bold text-xs flex items-center justify-center font-mono">01</span>
                        <span class="text-[10px] font-mono text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full font-bold">PREPARE</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1 font-heading">เตรียมแปลงและท่อ</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ปรับระดับดินให้เรียบเสมอ ฝังท่อ PVC 4 นิ้ว (เจาะรู 5-8 mm รอบท่อช่วงล่าง) ลึก 20-25 cm โผล่เหนือน้ำ 20 cm
                    </p>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 text-[11px] font-mono text-emerald-700">
                    <i class="fa-solid fa-bore-hole mr-1"></i>ท่อสังเกตการณ์
                </div>
            </div>

            <!-- Step 2 -->
            <div class="glass-card p-5 rounded-2xl border-t-4 border-cyan-500 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-full bg-cyan-600 text-white font-bold text-xs flex items-center justify-center font-mono">02</span>
                        <span class="text-[10px] font-mono text-cyan-700 bg-cyan-50 px-2 py-0.5 rounded-full font-bold">SENSOR</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1 font-heading">ติดตั้งเซนเซอร์</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ติดตั้งหัวโพรบอัลตราโซนิกกันน้ำ AJ-SR04M บนฝาครอบ PVC ด้านบน ยิงคลื่นสะท้อนผิวน้ำอย่างแม่นยำระดับมิลลิเมตร
                    </p>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 text-[11px] font-mono text-cyan-700">
                    <i class="fa-solid fa-water mr-1"></i>Echo Ultrasonic
                </div>
            </div>

            <!-- Step 3 -->
            <div class="glass-card p-5 rounded-2xl border-t-4 border-teal-500 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-full bg-teal-600 text-white font-bold text-xs flex items-center justify-center font-mono">03</span>
                        <span class="text-[10px] font-mono text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full font-bold">EDGE IOT</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1 font-heading">บอร์ด HandySense</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        บอร์ด ESP32 ประมวลผล แปลงระยะทางเป็นระดับน้ำเทียบผิวดิน และส่งข้อมูลผ่าน 4G / WiFi ขึ้นคลาวด์และแจ้งเตือน LINE
                    </p>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 text-[11px] font-mono text-teal-700">
                    <i class="fa-solid fa-microchip mr-1"></i>ESP32 + 4G LTE
                </div>
            </div>

            <!-- Step 4 -->
            <div class="glass-card p-5 rounded-2xl border-t-4 border-amber-500 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-full bg-amber-600 text-white font-bold text-xs flex items-center justify-center font-mono">04</span>
                        <span class="text-[10px] font-mono text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full font-bold">CONTROL</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1 font-heading">รอบเปียกสลับแห้ง</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ปล่อยให้น้ำแห้งจนถึง -15 cm แล้วสั่งเปิดโซลินอยด์วาล์วเติมน้ำท่วม 5 cm สลับตามระยะการเจริญเติบโตของต้นข้าว
                    </p>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 text-[11px] font-mono text-amber-700">
                    <i class="fa-solid fa-arrows-spin mr-1"></i>AWD Cycle Active
                </div>
            </div>

            <!-- Step 5 -->
            <div class="glass-card p-5 rounded-2xl border-t-4 border-blue-500 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-full bg-blue-600 text-white font-bold text-xs flex items-center justify-center font-mono">05</span>
                        <span class="text-[10px] font-mono text-blue-700 bg-blue-50 px-2 py-0.5 rounded-full font-bold">CARBON</span>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1 font-heading">วัดผลและคาร์บอน</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        รากข้าวหยั่งลึก แตกกอดี เมล็ดเต่ง ไม่ล้มง่าย พร้อมบันทึกหลักฐานข้อมูลรอบน้ำแห้งเพื่อยื่นรับรองคาร์บอนเครดิต T-VER
                    </p>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-100 text-[11px] font-mono text-blue-700">
                    <i class="fa-solid fa-certificate mr-1"></i>T-VER Verified
                </div>
            </div>

        </div>

    </section>
