    <!-- ========================================================================= -->
    <!-- 15. MODALS & FLOATING AI ASSISTANT (NONG iLEQs 🤖)                        -->
    <!-- ========================================================================= -->

    <!-- Floating AI Assistant Button (Bottom Right) -->
    <div class="fixed bottom-20 md:bottom-6 right-4 z-40">
        <button onclick="openIleqsModal()" class="group relative flex items-center gap-2 p-2.5 sm:px-4 sm:py-2.5 rounded-full bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white shadow-2xl hover:shadow-emerald-500/30 transform hover:scale-105 transition-all duration-300 border-2 border-white/60">
            <div class="relative w-9 h-9 sm:w-8 sm:h-8 flex-shrink-0">
                <img src="assets/images/nong_ileqs.png" 
                     onerror="this.src='assets/images/nong_smartscience.png'"
                     alt="น้อง iLEQs" class="w-full h-full object-cover rounded-full">
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-cyan-400 rounded-full animate-ping"></span>
            </div>
            <div class="hidden sm:flex flex-col text-left">
                <span class="text-xs font-bold leading-tight">น้อง iLEQs</span>
                <span class="text-[10px] text-emerald-100 font-mono">ผู้ช่วย AI ประจำ LEQs</span>
            </div>
        </button>
    </div>

    <!-- Procurement Summary Modal -->
    <div id="procurementModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="glass-card bg-white max-w-2xl w-full rounded-3xl p-6 sm:p-8 shadow-2xl border border-gray-200 relative max-h-[90vh] overflow-y-auto space-y-5">
            <button onclick="closeProcurementModal()" class="absolute top-5 right-5 text-gray-400 hover:text-gray-700 text-xl p-2">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shadow-sm">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 font-heading">สรุปงบประมาณการจัดซื้อ (BOM Summary)</h3>
                    <div class="text-xs text-gray-500 font-mono">ระบบ HandySense AWD ฉบับปรับปรุงโดย LEQs RBRU</div>
                </div>
            </div>

            <div class="space-y-3 text-xs sm:text-sm text-gray-600">
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 font-mono">
                    <span>ช่วงประมาณการราคาอุปกรณ์จริง (ฮาร์ดแวร์ครบชุด):</span>
                    <div class="text-right">
                        <div class="text-xl font-black text-emerald-800">3,030 – 5,010 บาท</div>
                        <div class="text-[11px] text-emerald-600 font-semibold">(ค่ากลางเฉลี่ยมาตรฐาน ~3,630 บาท)</div>
                    </div>
                </div>

                <div class="space-y-2">
                    <h4 class="font-bold text-gray-800">การแบ่งกลุ่มจัดซื้อตามช่วงราคาจริง (รวม 15 รายการ):</h4>
                    <ul class="list-disc pl-5 space-y-1 text-xs">
                        <li><strong>กลุ่มที่ 1 เซนเซอร์และท่อ:</strong> 400 – 630 บาท (เซนเซอร์ AJ-SR04M IP67 + ท่อ PVC 4" + ฝาครอบ)</li>
                        <li><strong>กลุ่มที่ 2 บอร์ดควบคุม จอแสดงผล และสื่อสาร:</strong> 935 – 1,520 บาท (ESP32-S3 + จอ LCD 20x4 I2C + 4G LTE A7670E + รีเลย์)</li>
                        <li><strong>กลุ่มที่ 3 ระบบพลังงานแสงอาทิตย์:</strong> 965 – 1,670 บาท (แผงโซลาร์ 10-20W + Controller + LiFePO4)</li>
                        <li><strong>กลุ่มที่ 4 ตู้กันน้ำฝาใสและวาล์วไฟฟ้า:</strong> 730 – 1,190 บาท (กล่อง ABS/PC ฝาใส IP65 + โซลินอยด์วาล์ว 1" + เสากัลวาไนซ์)</li>
                    </ul>
                </div>

                <div class="p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 space-y-1">
                    <div class="font-bold flex items-center gap-1.5 text-amber-950">
                        <i class="fa-solid fa-triangle-exclamation text-amber-600"></i>
                        <span>ข้อชี้แจงขอบเขตราคา (Hardware Only):</span>
                    </div>
                    <p class="text-[11px] text-gray-700 leading-relaxed">
                        ราคาประเมินข้างต้นเป็น <strong>เฉพาะค่าวัสดุและอุปกรณ์ฮาร์ดแวร์สนามจริง</strong> 
                        <strong>ไม่ได้รวมค่า Cloud Server, ระบบฐานข้อมูล และค่าพัฒนาแอปพลิเคชันสมาร์ทโฟน</strong>
                    </p>
                    <p class="text-[10px] text-gray-500 font-mono">
                        * สำหรับการเชื่อมต่อสมาร์ทโฟนในแปลงนา สามารถใช้งานผ่าน Bluetooth LE หรือ WiFi Direct โดยไม่ต้องเสียค่าบริการเซิร์ฟเวอร์รายเดือน
                    </p>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex flex-wrap justify-end gap-2">
                <a href="HandySense_AWD_Procurement_Guide.md" class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-bold transition flex items-center gap-1.5">
                    <i class="fa-solid fa-file-lines"></i> อ่านคู่มือจัดซื้อฉบับเต็ม
                </a>
                <button onclick="closeProcurementModal()" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                    ปิดหน้าต่าง
                </button>
            </div>
        </div>
    </div>

    <!-- iLEQs AI Modal -->
    <div id="ileqsModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="glass-card bg-white max-w-lg w-full rounded-3xl p-6 shadow-2xl border border-gray-200 relative space-y-4">
            <button onclick="closeIleqsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-xl p-2">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-100 to-cyan-100 text-emerald-700 flex items-center justify-center text-2xl shadow-sm border border-emerald-200/50">
                    <i class="fa-solid fa-robot"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 font-heading flex items-center gap-2">
                        <span>น้อง iLEQs 🤖</span>
                        <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-mono font-semibold">AI Assistant</span>
                    </h3>
                    <div class="text-xs text-gray-500 font-mono">ผู้ช่วย AI อัจฉริยะ ให้คำปรึกษาด้านฟิสิกส์เกษตร LEQs</div>
                </div>
            </div>

            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-xs text-slate-700 space-y-2">
                <p>
                    สวัสดีครับ! ผมคือ <strong>น้อง iLEQs</strong> ผู้ช่วยอัจฉริยะประจำศูนย์ LEQs มหาวิทยาลัยราชภัฏรำไพพรรณี พร้อมตอบคำถามและให้ข้อมูลเกี่ยวกับการติดตั้ง HandySense AWD, 
                    การคำนวณคาร์บอนเครดิต T-VER และนวัตกรรมเกษตรแม่นยำครับ
                </p>
                <div class="pt-2 border-t border-slate-200 font-semibold text-slate-900">
                    หัวข้อที่ถามบ่อย:
                </div>
                <div class="flex flex-wrap gap-1.5 pt-1">
                    <button onclick="askIleqs('awd_depth')" class="px-2.5 py-1 rounded-lg bg-white border border-gray-200 text-[11px] hover:bg-emerald-50 hover:text-emerald-700 transition">
                        🌊 ระดับน้ำ -15 cm วัดอย่างไร?
                    </button>
                    <button onclick="askIleqs('ch4_reduction')" class="px-2.5 py-1 rounded-lg bg-white border border-gray-200 text-[11px] hover:bg-emerald-50 hover:text-emerald-700 transition">
                        🌱 ลดมีเทน 48% ได้จริงไหม?
                    </button>
                    <button onclick="askIleqs('contact_chewa')" class="px-2.5 py-1 rounded-lg bg-white border border-gray-200 text-[11px] hover:bg-emerald-50 hover:text-emerald-700 transition">
                        📞 ติดต่อ ผศ.ดร.ชีวะ
                    </button>
                </div>
            </div>

            <div id="ileqsAnswer" class="hidden p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-900 leading-relaxed">
            </div>

            <div class="pt-2 text-right">
                <button onclick="closeIleqsModal()" class="px-4 py-2 rounded-xl bg-gray-800 hover:bg-black text-white text-xs font-bold transition">
                    ตกลง
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- 16. LIVE SENSOR TELEMETRY & SIMULATION SHEET (MOBILE BOTTOM SHEET & MODAL) -->
    <!-- Accessible via the Center 3D Convex Dome Menu on Smartphone Bottom Bar     -->
    <!-- ========================================================================= -->
    <div id="sensorTelemetryModal" class="fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-md hidden flex items-end sm:items-center justify-center p-0 sm:p-4 transition-all duration-300">
        
        <div class="glass-card bg-white w-full sm:max-w-2xl rounded-t-3xl sm:rounded-3xl p-5 sm:p-7 shadow-2xl border border-gray-200 relative max-h-[88vh] overflow-y-auto space-y-4">
            
            <!-- Mobile Drag Handle Bar -->
            <div class="w-12 h-1.5 rounded-full bg-slate-300 mx-auto -mt-1 mb-2 sm:hidden"></div>

            <!-- Header -->
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-teal-600 via-emerald-600 to-cyan-500 text-white flex items-center justify-center text-xl shadow-md border border-teal-300/40 shrink-0">
                        <i class="fa-solid fa-tower-broadcast animate-pulse"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h3 class="text-base sm:text-lg font-bold text-gray-900 font-heading">ข้อมูลตรวจวัดระดับน้ำและเซนเซอร์สนาม</h3>
                            <span class="px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[10px] font-mono font-bold">LIVE TELEMETRY</span>
                        </div>
                        <p class="text-xs text-gray-500 font-mono">HandySense-AWD | หน่วย LEQs มหาวิทยาลัยราชภัฏรำไพพรรณี</p>
                    </div>
                </div>
                <button onclick="closeSensorDataModal()" class="w-9 h-9 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-900 flex items-center justify-center transition shrink-0" title="ปิดหน้าต่าง">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Mode Selector: Simulation vs Real Sensor Ready -->
            <div class="bg-slate-100 p-1 rounded-2xl flex items-center text-xs font-bold font-mono border border-slate-200">
                <button id="btnModalModeSim" onclick="switchModalSensorTab('sim')" class="flex-1 py-2 px-3 rounded-xl transition bg-emerald-600 text-white shadow-xs flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-flask"></i>
                    <span>โหมดจำลอง (Simulation)</span>
                </button>
                <button id="btnModalModeReal" onclick="switchModalSensorTab('real')" class="flex-1 py-2 px-3 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-wifi"></i>
                    <span>โหมดเซนเซอร์จริง (Real IoT Ready)</span>
                </button>
            </div>

            <!-- ============================================================= -->
            <!-- TAB 1: ACTIVE SIMULATION VIEW                                 -->
            <!-- ============================================================= -->
            <div id="modalSensorSimView" class="space-y-4">
                
                <!-- Main Water Level Card -->
                <div class="rounded-2xl p-4 bg-gradient-to-br from-slate-900 via-slate-900 to-teal-950 text-white border border-teal-500/30 relative overflow-hidden space-y-3">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="text-slate-400 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                            <span>สถานะระดับน้ำในแปลงนา:</span>
                        </span>
                        <span id="modalSensorStagePill" class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-950 text-emerald-300 border border-emerald-500/40">
                            AWD DRYING PHASE
                        </span>
                    </div>

                    <div class="flex items-baseline justify-between">
                        <div>
                            <div class="text-[11px] text-slate-400 font-mono">ระดับน้ำวัดจากผิวดิน (Water Depth):</div>
                            <div class="text-3xl sm:text-4xl font-black font-tech text-emerald-400 flex items-baseline gap-2">
                                <span id="modalSensorWaterVal">-3.5</span>
                                <span class="text-base font-normal text-slate-300">cm</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-[11px] text-slate-400 font-mono">โซลินอยด์วาล์วน้ำ (12V):</div>
                            <div id="modalSensorValveTxt" class="text-lg sm:text-xl font-bold font-mono text-slate-300">
                                CLOSED
                            </div>
                        </div>
                    </div>

                    <!-- Water Level Depth Bar Graphic -->
                    <div class="space-y-1 pt-1">
                        <div class="w-full bg-slate-800 rounded-full h-3 overflow-hidden border border-slate-700 relative">
                            <div id="modalSensorWaterBar" class="h-full bg-gradient-to-r from-teal-500 to-emerald-400 transition-all duration-300" style="width: 55%;"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-400 font-mono">
                            <span>วิกฤตเปิดน้ำ (-15 cm)</span>
                            <span class="text-amber-300">ระดับผิวดิน (0 cm)</span>
                            <span>น้ำขัง (+5 cm)</span>
                        </div>
                    </div>

                    <!-- Quick Modal Slider -->
                    <div class="bg-white/10 p-2.5 rounded-xl border border-white/10 space-y-1">
                        <div class="flex items-center justify-between text-[11px] font-mono text-slate-300">
                            <span><i class="fa-solid fa-sliders text-teal-400 mr-1"></i> เลื่อนปรับระดับน้ำจำลอง:</span>
                            <span id="modalSliderValueLabel" class="font-bold text-teal-300">-3.5 cm</span>
                        </div>
                        <input type="range" id="modalWaterSlider" min="-20" max="10" step="0.5" value="-3.5" 
                               oninput="onModalSliderChange(this.value)" 
                               class="w-full accent-teal-400 h-2 bg-slate-700 rounded-lg cursor-pointer">
                    </div>
                </div>

                <!-- 4 Telemetry Metrics Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-xs font-mono">
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-200 space-y-1">
                        <div class="text-[10px] text-gray-500">เซนเซอร์ AJ-SR04M</div>
                        <div id="modalSensorDistVal" class="text-sm sm:text-base font-bold text-gray-900">23.5 cm</div>
                        <div class="text-[9.5px] text-emerald-700 font-sans">ระยะวัดถึงผิวน้ำ</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-emerald-50 border border-emerald-200 space-y-1">
                        <div class="text-[10px] text-emerald-800">ลดก๊าซมีเทน (CH₄)</div>
                        <div id="modalSensorMethaneVal" class="text-sm sm:text-base font-bold text-emerald-800">-48% ACTIVE</div>
                        <div class="text-[9.5px] text-emerald-700 font-sans">คาร์บอนเครดิต</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-amber-50 border border-amber-200 space-y-1">
                        <div class="text-[10px] text-amber-800">แบตเตอรี่ LiFePO4</div>
                        <div class="text-sm sm:text-base font-bold text-amber-900">13.2 V (94%)</div>
                        <div class="text-[9.5px] text-amber-700 font-sans">พลังงานสำรองพร้อม</div>
                    </div>
                    <div class="p-3 rounded-2xl bg-cyan-50 border border-cyan-200 space-y-1">
                        <div class="text-[10px] text-cyan-800">โซลาร์เซลล์ 20W</div>
                        <div class="text-sm sm:text-base font-bold text-cyan-900">18.2 V / 14.5 W</div>
                        <div class="text-[9.5px] text-cyan-700 font-sans">กำลังชาร์จกลางแจ้ง</div>
                    </div>
                </div>

                <!-- Jump to Full Simulation Button -->
                <div class="pt-1 flex items-center justify-between gap-2">
                    <button onclick="toggleWebAudioSynth()" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-volume-high text-teal-600"></i>
                        <span class="hidden sm:inline">เสียงโซนาร์</span>
                    </button>
                    <a href="#simulator" onclick="closeSensorDataModal()" class="flex-1 px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition text-center shadow-sm flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-flask"></i>
                        <span>เปิดแท่นแล็บจำลองเต็มรูปแบบ (#simulator)</span>
                    </a>
                </div>

            </div>

            <!-- ============================================================= -->
            <!-- TAB 2: REAL HARDWARE / IOT TELEMETRY READY VIEW               -->
            <!-- ============================================================= -->
            <div id="modalSensorRealView" class="hidden space-y-3.5">
                
                <div class="p-3.5 rounded-2xl bg-gradient-to-r from-teal-50 to-emerald-50 border border-teal-200 space-y-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-bold text-teal-950 flex items-center gap-1.5">
                            <i class="fa-solid fa-microchip text-teal-600"></i>
                            <span>การเชื่อมต่อเซนเซอร์ฮาร์ดแวร์จริง (Real Hardware Telemetry)</span>
                        </span>
                        <span id="bleStatusBadge" class="px-2 py-0.5 rounded-full bg-emerald-200 text-emerald-900 text-[10px] font-mono font-bold">
                            READY TO CONNECT
                        </span>
                    </div>
                    <p class="text-xs text-gray-700 leading-relaxed">
                        ระบบสถาปัตยกรรม HandySense-AWD ของหน่วย LEQs รองรับการดึงข้อมูลจากบอร์ด <strong>ESP32-S3 ATD3.5</strong> 
                        และเซนเซอร์อัลตราโซนิก <strong>AJ-SR04M</strong> ในแปลงนาจริงได้ทันทีผ่าน 2 ช่องทาง:
                    </p>
                </div>

                <!-- Hardware Specifications Table -->
                <div class="border border-gray-200 rounded-2xl overflow-hidden text-xs">
                    <div class="bg-gray-50 px-3.5 py-2 font-bold text-gray-700 border-b border-gray-200 font-mono">
                        <i class="fa-solid fa-network-wired text-emerald-600 mr-1"></i> โหนดเซนเซอร์สนามที่รองรับ (Field Node Telemetry)
                    </div>
                    <div class="divide-y divide-gray-100 text-gray-700 font-mono">
                        <div class="px-3.5 py-2 flex justify-between items-center bg-white">
                            <span class="text-gray-500">Node ID:</span>
                            <span class="font-bold text-gray-900">LEQs-AWD-NODE-01</span>
                        </div>
                        <div class="px-3.5 py-2 flex justify-between items-center bg-gray-50/50">
                            <span class="text-gray-500">Hardware MAC:</span>
                            <span class="font-bold text-emerald-700">B4:E6:2D:68:C1:4F</span>
                        </div>
                        <div class="px-3.5 py-2 flex justify-between items-center bg-white">
                            <span class="text-gray-500">Protocol:</span>
                            <span class="text-gray-900">BLE 5.0 (10-30m) / WiFi Direct / 4G MQTT</span>
                        </div>
                        <div class="px-3.5 py-2 flex justify-between items-center bg-gray-50/50">
                            <span class="text-gray-500">Firmware:</span>
                            <span class="text-teal-700 font-bold">LEQs-HandySense AWD v2.4.0</span>
                        </div>
                        <div class="px-3.5 py-2 flex justify-between items-center bg-white">
                            <span class="text-gray-500">Central Host:</span>
                            <span class="text-blue-700">leqs-smartfarm.rbru.ac.th</span>
                        </div>
                    </div>
                </div>

                <!-- Interactive BLE Scanning Simulation -->
                <div class="p-3.5 rounded-2xl bg-slate-900 text-white space-y-2.5">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="text-teal-300 font-bold flex items-center gap-1.5">
                            <i class="fa-brands fa-bluetooth-b"></i> Bluetooth LE Direct (ฟรี 100% ไร้ค่าเซิร์ฟเวอร์)
                        </span>
                        <span class="text-[10px] text-slate-400">ระยะ 10 - 30 เมตร</span>
                    </div>
                    <p class="text-[11px] text-slate-300 leading-relaxed">
                        เกษตรกรสามารถเปิดบลูทูธบนสมาร์ทโฟนเพื่อเชื่อมต่อตรงกับกล่อง HandySense ข้างคันนา 
                        ดูระดับน้ำและสั่งเปิด-ปิดวาล์วได้ทันทีโดยไม่ต้องต่ออินเทอร์เน็ต
                    </p>
                    <div id="bleScanResult" class="hidden p-2.5 rounded-xl bg-teal-950/80 border border-teal-500/50 text-xs font-mono space-y-1">
                        <div class="text-emerald-300 font-bold flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-emerald-400"></i>
                            <span>พบอุปกรณ์: LEQs-AWD-NODE-01</span>
                        </div>
                        <div class="text-[11px] text-slate-300">
                            สัญญาณ: -58 dBm | เซนเซอร์: 23.5 cm (AWD -3.5 cm) | แบตฯ: 94%
                        </div>
                    </div>
                    <button id="btnScanBle" onclick="simulateBleScan()" class="w-full py-2.5 rounded-xl bg-gradient-to-r from-teal-500 to-emerald-600 hover:from-teal-600 hover:to-emerald-700 text-white font-bold text-xs transition flex items-center justify-center gap-2 shadow-sm">
                        <i class="fa-solid fa-radar"></i>
                        <span>สแกนค้นหาอุปกรณ์ HandySense BLE ในแปลงนา</span>
                    </button>
                </div>

                <div class="p-3 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 flex items-start gap-2">
                    <i class="fa-solid fa-circle-info text-amber-600 mt-0.5 shrink-0"></i>
                    <span>
                        หากนำชุดฮาร์ดแวร์ไปติดตั้งจริง สามารถเปิดหน้าเว็บนี้แล้วเชื่อมต่อเพื่ออ่านค่าเซนเซอร์สดขึ้นหน้าจอได้ทันที
                    </span>
                </div>

            </div>

            <!-- Footer Close -->
            <div class="pt-2 border-t border-gray-100 flex justify-end">
                <button onclick="closeSensorDataModal()" class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-bold transition">
                    ปิดหน้าต่าง
                </button>
            </div>

        </div>
    </div>

