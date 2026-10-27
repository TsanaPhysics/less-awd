    <!-- ========================================================================= -->
    <!-- 7. ESP32-S3 ATD3.5 4-SCREENS SHOWCASE                                      -->
    <!-- ========================================================================= -->
    <section id="screens" class="space-y-8 scroll-mt-28">
        
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-cyan-100 text-cyan-800 text-xs font-bold uppercase tracking-wider font-mono">
                <i class="fa-solid fa-desktop text-cyan-600 mr-1"></i> ATD 3.5" Color LCD Operating Screens
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-heading font-extrabold text-gray-900 tracking-tight">
                หน้าจอแสดงผลสนาม ESP32 ATD 3.5 นิ้ว
            </h2>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                ออกแบบอินเทอร์เฟซภาษาไทย คอนทราสต์สูง อ่านง่ายแม้อยู่กลางแสงแดดจ้าข้างแปลงนา
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4">
            
            <!-- Screen 1 -->
            <div class="lcd-frame rounded-2xl p-4 text-white flex flex-col justify-between shadow-md">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-2 mb-3">
                        <span class="text-[10px] font-mono text-cyan-400">SCREEN 01</span>
                        <span class="text-[10px] font-mono text-slate-400">HOME TELEMETRY</span>
                    </div>
                    <h3 class="text-sm font-bold text-emerald-300 font-heading mb-1">หน้าหลัก : ระดับน้ำและพลังงาน</h3>
                    <div class="space-y-2 font-mono text-xs mt-3">
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">ระดับน้ำ:</span>
                            <strong class="text-cyan-300">-3.5 cm</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">แบตเตอรี่:</span>
                            <strong class="text-emerald-300">12.6V (94%)</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">โซลาร์ชาร์จ:</span>
                            <strong class="text-amber-300">14.8 W</strong>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-t border-slate-800 text-[10px] text-slate-400 font-mono">
                    <i class="fa-solid fa-circle-check text-emerald-400 mr-1"></i>ระบบทำงานปกติ
                </div>
            </div>

            <!-- Screen 2 -->
            <div class="lcd-frame rounded-2xl p-4 text-white flex flex-col justify-between shadow-md">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-2 mb-3">
                        <span class="text-[10px] font-mono text-cyan-400">SCREEN 02</span>
                        <span class="text-[10px] font-mono text-slate-400">HYDROGRAPH</span>
                    </div>
                    <h3 class="text-sm font-bold text-teal-300 font-heading mb-1">กราฟประวัติระดับน้ำ 7 วัน</h3>
                    <div class="p-2.5 rounded bg-slate-900/80 border border-slate-800 text-xs font-mono mt-3 space-y-1.5">
                        <div class="text-[10px] text-slate-400">AWD Cycle Progression:</div>
                        <!-- Simple visual ASCII/SVG graph -->
                        <div class="h-14 flex items-end justify-between gap-1 pt-2">
                            <div class="w-3 bg-emerald-500 rounded-t h-[80%]" title="Day 1: +5cm"></div>
                            <div class="w-3 bg-emerald-400 rounded-t h-[65%]" title="Day 2: +2cm"></div>
                            <div class="w-3 bg-teal-400 rounded-t h-[45%]" title="Day 3: -3cm"></div>
                            <div class="w-3 bg-teal-500 rounded-t h-[30%]" title="Day 4: -8cm"></div>
                            <div class="w-3 bg-amber-400 rounded-t h-[20%]" title="Day 5: -12cm"></div>
                            <div class="w-3 bg-rose-500 rounded-t h-[12%]" title="Day 6: -15cm"></div>
                            <div class="w-3 bg-emerald-500 rounded-t h-[85%]" title="Day 7: +6cm"></div>
                        </div>
                        <div class="flex justify-between text-[9px] text-slate-400">
                            <span>D-7</span><span>D-4</span><span>วันนี้</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-t border-slate-800 text-[10px] text-slate-400 font-mono">
                    <i class="fa-solid fa-chart-line text-cyan-400 mr-1"></i>รอบที่ 2 สำเร็จ
                </div>
            </div>

            <!-- Screen 3 -->
            <div class="lcd-frame rounded-2xl p-4 text-white flex flex-col justify-between shadow-md">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-2 mb-3">
                        <span class="text-[10px] font-mono text-cyan-400">SCREEN 03</span>
                        <span class="text-[10px] font-mono text-slate-400">VALVE CONTROL</span>
                    </div>
                    <h3 class="text-sm font-bold text-amber-300 font-heading mb-1">ควบคุมวาล์วและรีเลย์</h3>
                    <div class="space-y-2 font-mono text-xs mt-3">
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">โหมดสั่งการ:</span>
                            <strong class="text-teal-300">AUTO (AWD)</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">โซลินอยด์วาล์ว 1":</span>
                            <strong class="text-slate-400">CLOSED</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">สั่งเปิดเมื่อ:</span>
                            <strong class="text-rose-400">&lt;= -15.0 cm</strong>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-t border-slate-800 text-[10px] text-slate-400 font-mono">
                    <i class="fa-solid fa-toggle-on text-amber-400 mr-1"></i>Standby Mode
                </div>
            </div>

            <!-- Screen 4 -->
            <div class="lcd-frame rounded-2xl p-4 text-white flex flex-col justify-between shadow-md">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-2 mb-3">
                        <span class="text-[10px] font-mono text-cyan-400">SCREEN 04</span>
                        <span class="text-[10px] font-mono text-slate-400">CLOUD &amp; LINE</span>
                    </div>
                    <h3 class="text-sm font-bold text-cyan-300 font-heading mb-1">การสื่อสารและการแจ้งเตือน</h3>
                    <div class="space-y-2 font-mono text-xs mt-3">
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">สัญญาณ 4G:</span>
                            <strong class="text-cyan-300">-68 dBm (Good)</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">LINE Notify:</span>
                            <strong class="text-emerald-300">CONNECTED</strong>
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-slate-800 flex justify-between">
                            <span class="text-slate-400">ฐานข้อมูล:</span>
                            <strong class="text-teal-300">SQLite + Sheets</strong>
                        </div>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-t border-slate-800 text-[10px] text-slate-400 font-mono">
                    <i class="fa-brands fa-line text-emerald-400 mr-1"></i>ส่งเตือนล่าสุด 10 นาทีที่แล้ว
                </div>
            </div>

        </div>

    </section>
