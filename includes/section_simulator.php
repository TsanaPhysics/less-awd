    <!-- ========================================================================= -->
    <!-- 6. INTERACTIVE VIRTUAL SIMULATOR (ESP32-S3 ATD3.5 LIVE LAB & SONAR SYNTH)  -->
    <!-- ========================================================================= -->
    <section id="simulator" class="space-y-8 scroll-mt-28">
        
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-teal-100 text-teal-800 text-xs font-bold uppercase tracking-wider font-mono">
                <i class="fa-solid fa-flask text-teal-600 mr-1"></i> Interactive Edge Simulation &amp; Acoustic Physics
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-heading font-extrabold text-gray-900 tracking-tight">
                ห้องปฏิบัติการเสมือนจริง : เซนเซอร์ระดับน้ำและคลื่นเสียงโซนาร์
            </h2>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                ทดลองปรับระดับน้ำในแปลงนาข้าวเพื่อสังเกตการคำนวณคลื่นอัลตราโซนิก การทำงานของโซลินอยด์วาล์ว และการยับยั้งก๊าซมีเทน
            </p>
        </div>

        <!-- Mode Toggle & Sound Synth Controls -->
        <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center justify-between gap-3 sm:gap-4 p-3.5 sm:p-4 rounded-2xl bg-white border border-gray-200 shadow-sm">
            <div class="flex flex-col xs:flex-row items-start xs:items-center gap-2">
                <span class="text-xs font-bold text-gray-500 font-mono shrink-0">โหมดจำลอง:</span>
                <div class="grid grid-cols-1 xs:grid-cols-2 sm:inline-flex rounded-xl p-1 bg-gray-100 border border-gray-200 w-full xs:w-auto">
                    <button id="btnModeRice" onclick="switchSimulatorMode('rice_awd')" class="px-3 py-1.5 rounded-lg text-xs font-bold transition bg-emerald-600 text-white shadow-sm flex items-center justify-center gap-1.5 text-center">
                        <i class="fa-solid fa-seedling"></i>
                        <span>1. นาข้าวเปียกสลับแห้ง (AWD)</span>
                    </button>
                    <button id="btnModeDurian" onclick="switchSimulatorMode('durian_vpd')" class="px-3 py-1.5 rounded-lg text-xs font-bold transition text-gray-600 hover:text-gray-900 flex items-center justify-center gap-1.5 text-center">
                        <i class="fa-solid fa-tree"></i>
                        <span>2. สวนทุเรียนดุลแรงดันไอ (VPD)</span>
                    </button>
                </div>
            </div>

            <!-- Audio Synthesizer Toggle -->
            <div class="flex flex-wrap items-center justify-between sm:justify-end gap-2 pt-2 sm:pt-0 border-t sm:border-t-0 border-gray-100">
                <button id="synthSoundBtn" onclick="toggleWebAudioSynth()" class="flex-1 sm:flex-none justify-center px-3 py-1.5 rounded-xl border border-teal-300 bg-teal-50 text-teal-800 hover:bg-teal-100 text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                    <i class="fa-solid fa-volume-high text-teal-600" id="synthSoundIcon"></i>
                    <span id="synthSoundLabel">เสียงคลื่นโซนาร์: เปิด</span>
                </button>
                <button onclick="playSonarPingAudio()" class="px-3 py-1.5 rounded-xl bg-gray-800 text-white hover:bg-black text-xs font-mono font-bold transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-wave-square text-cyan-400"></i>
                    <span>ทดสอบ Ping!</span>
                </button>
            </div>
        </div>

        <!-- Simulator Grid: Left Cross-Section SVG, Right Smart Screen LCD Frame -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            
            <!-- Left: SVG Cross-Section Model -->
            <div class="lg:col-span-7 glass-card p-6 rounded-3xl border border-gray-200 shadow-md flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></span>
                            <h3 class="font-bold text-gray-900 font-heading text-base">
                                หน้าตัดแบบจำลองท่อสังเกตการณ์ในแปลงนา (AWD Well Cross-Section)
                            </h3>
                        </div>
                        <span class="text-xs font-mono bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full border border-slate-300">
                            Scale 1:1 cm
                        </span>
                    </div>

                    <!-- SVG Dynamic Cross Section View -->
                    <div class="w-full bg-gradient-to-b from-sky-50 via-slate-50 to-amber-50/50 rounded-2xl border-2 border-slate-200 overflow-hidden relative shadow-inner flex items-center justify-center p-2 min-h-[340px]">
                        
                        <svg id="awdSvgCrossSection" viewBox="0 0 600 380" class="w-full h-auto max-h-[360px] drop-shadow-md">
                            <defs>
                                <linearGradient id="skyGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#bae6fd" stop-opacity="0.4"/>
                                    <stop offset="100%" stop-color="#f0fdf4" stop-opacity="0.1"/>
                                </linearGradient>
                                <linearGradient id="soilGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#78350f" stop-opacity="0.85"/>
                                    <stop offset="100%" stop-color="#451a03" stop-opacity="0.95"/>
                                </linearGradient>
                                <linearGradient id="waterGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#0284c7" stop-opacity="0.85"/>
                                    <stop offset="100%" stop-color="#0369a1" stop-opacity="0.95"/>
                                </linearGradient>
                                <linearGradient id="pvcGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#cbd5e1"/>
                                    <stop offset="50%" stop-color="#ffffff"/>
                                    <stop offset="100%" stop-color="#94a3b8"/>
                                </linearGradient>
                            </defs>

                            <!-- Sky & Air Background -->
                            <rect x="0" y="0" width="600" height="150" fill="url(#skyGrad)"/>

                            <!-- Soil Layer (Ground Level at Y = 150) -->
                            <rect x="0" y="150" width="600" height="230" fill="url(#soilGrad)"/>

                            <!-- Ground Surface Level Line -->
                            <line x1="0" y1="150" x2="600" y2="150" stroke="#15803d" stroke-width="4" stroke-dasharray="8 4"/>
                            <text x="20" y="142" font-family="'Kanit', sans-serif" font-size="12" font-weight="bold" fill="#166534">
                                ระดับผิวดิน (Ground Level: 0 cm)
                            </text>

                            <!-- Rice Plants Artwork -->
                            <g transform="translate(60, 95)">
                                <path d="M0,55 Q-10,20 -25,0 M0,55 Q0,15 0,-5 M0,55 Q12,20 25,2 M0,55 Q20,30 35,15" stroke="#16a34a" stroke-width="3" fill="none" stroke-linecap="round"/>
                                <circle cx="-25" cy="0" r="3" fill="#eab308"/>
                                <circle cx="0" cy="-5" r="3" fill="#eab308"/>
                                <circle cx="25" cy="2" r="3" fill="#eab308"/>
                            </g>
                            <g transform="translate(140, 95)">
                                <path d="M0,55 Q-12,25 -28,5 M0,55 Q-2,10 2,-8 M0,55 Q14,18 28,5" stroke="#16a34a" stroke-width="3" fill="none" stroke-linecap="round"/>
                                <circle cx="-28" cy="5" r="3" fill="#eab308"/>
                                <circle cx="2" cy="-8" r="3" fill="#eab308"/>
                                <circle cx="28" cy="5" r="3" fill="#eab308"/>
                            </g>
                            <g transform="translate(460, 95)">
                                <path d="M0,55 Q-15,20 -30,0 M0,55 Q2,12 -2,-6 M0,55 Q15,22 30,2" stroke="#16a34a" stroke-width="3" fill="none" stroke-linecap="round"/>
                                <circle cx="-30" cy="0" r="3" fill="#eab308"/>
                                <circle cx="-2" cy="-6" r="3" fill="#eab308"/>
                                <circle cx="30" cy="2" r="3" fill="#eab308"/>
                            </g>
                            <g transform="translate(540, 95)">
                                <path d="M0,55 Q-8,22 -22,2 M0,55 Q0,15 0,-4 M0,55 Q10,20 22,4" stroke="#16a34a" stroke-width="3" fill="none" stroke-linecap="round"/>
                                <circle cx="-22" cy="2" r="3" fill="#eab308"/>
                                <circle cx="0" cy="-4" r="3" fill="#eab308"/>
                                <circle cx="22" cy="4" r="3" fill="#eab308"/>
                            </g>

                            <!-- PVC Pipe 4" (Observation Well) Center X = 300, Width = 90 -->
                            <rect x="255" y="40" width="90" height="310" rx="4" fill="url(#pvcGrad)" stroke="#475569" stroke-width="2"/>
                            
                            <!-- Perforated Holes on PVC Pipe (Bottom 40 cm) -->
                            <g fill="#1e293b" opacity="0.6">
                                <circle cx="270" cy="240" r="3.5"/><circle cx="300" cy="240" r="3.5"/><circle cx="330" cy="240" r="3.5"/>
                                <circle cx="285" cy="265" r="3.5"/><circle cx="315" cy="265" r="3.5"/>
                                <circle cx="270" cy="290" r="3.5"/><circle cx="300" cy="290" r="3.5"/><circle cx="330" cy="290" r="3.5"/>
                                <circle cx="285" cy="315" r="3.5"/><circle cx="315" cy="315" r="3.5"/>
                            </g>

                            <!-- Water Body inside & outside pipe (Dynamic Height based on Water Level cm) -->
                            <!-- Ground is at Y=150. Level cm maps: Y = 150 - (level * 4.5) -->
                            <rect id="svgWaterRect" x="0" y="165" width="600" height="215" fill="url(#waterGrad)"/>
                            <!-- Water Surface Line -->
                            <line id="svgWaterLine" x1="0" y1="165" x2="600" y2="165" stroke="#38bdf8" stroke-width="3"/>

                            <!-- Water Level Measurement Line Marker -->
                            <line x1="240" y1="150" x2="240" y2="165" id="svgWaterDimLine" stroke="#f59e0b" stroke-width="2" stroke-dasharray="2 2"/>
                            
                            <!-- Ultrasonic Sensor Probe AJ-SR04M at Top of Pipe (Y = 40) -->
                            <rect x="275" y="32" width="50" height="22" rx="4" fill="#0f172a" stroke="#38bdf8" stroke-width="1.5"/>
                            <circle cx="290" cy="54" r="6" fill="#38bdf8"/>
                            <circle cx="310" cy="54" r="6" fill="#38bdf8"/>

                            <!-- Ultrasonic Echo Wave Arcs -->
                            <g stroke="#38bdf8" fill="none" opacity="0.8" id="svgSonarWaves">
                                <path d="M285,65 Q300,75 315,65" stroke-width="2"/>
                                <path d="M278,80 Q300,95 322,80" stroke-width="2"/>
                                <path d="M270,98 Q300,118 330,98" stroke-width="2"/>
                            </g>

                            <!-- Labels & Annotations -->
                            <text x="360" y="55" font-family="'Kanit', sans-serif" font-size="11" font-weight="bold" fill="#0f172a">
                                โพรบอัลตราโซนิก (AJ-SR04M)
                            </text>
                            <text x="360" y="70" font-family="'JetBrains Mono', monospace" font-size="10" fill="#0284c7">
                                Echo Time: <tspan id="svgEchoTimeTxt">1.24 ms</tspan>
                            </text>
                            
                            <!-- Dynamic Water Level Label -->
                            <rect id="svgLevelBadgeRect" x="355" y="152" width="165" height="26" rx="6" fill="#0f172a" opacity="0.85"/>
                            <text id="svgLevelTxt" x="365" y="169" font-family="'JetBrains Mono', monospace" font-size="12" font-weight="bold" fill="#38bdf8">
                                ระดับน้ำ: -3.5 cm
                            </text>

                            <!-- Critical Threshold Line at -15 cm (Y = 150 + 67.5 = 217.5) -->
                            <line x1="210" y1="217" x2="390" y2="217" stroke="#ef4444" stroke-width="2" stroke-dasharray="4 3"/>
                            <text x="395" y="221" font-family="'Kanit', sans-serif" font-size="10" font-weight="bold" fill="#ef4444">
                                เกณฑ์สูบน้ำเข้า (-15 cm)
                            </text>
                        </svg>

                    </div>
                </div>

                <!-- Simulation Sliders -->
                <div class="mt-4 space-y-3 pt-3 border-t border-gray-100">
                    <div class="flex items-center justify-between text-xs">
                        <label for="sliderWaterLevel" class="font-bold text-gray-700 flex items-center gap-1.5">
                            <i class="fa-solid fa-sliders text-emerald-600"></i>
                            <span>ปรับระดับน้ำในแปลงนา (Water Level):</span>
                        </label>
                        <span id="sliderWaterLevelVal" class="font-mono font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-lg border border-emerald-200">
                            -3.5 cm
                        </span>
                    </div>
                    <input type="range" id="sliderWaterLevel" min="-25" max="15" step="0.5" value="-3.5" 
                           oninput="onWaterLevelSliderChange(this.value)"
                           class="w-full h-2.5 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-600">
                    
                    <!-- Quick Presets -->
                    <div class="flex items-center gap-1.5 pt-1 text-[11px] font-mono overflow-x-auto no-scrollbar flex-nowrap sm:flex-wrap pb-1">
                        <span class="text-gray-400 mr-1 shrink-0">สถานะจำลอง:</span>
                        <button onclick="setWaterLevelPreset(8)" class="shrink-0 px-2.5 py-1 rounded bg-sky-100 text-sky-800 hover:bg-sky-200 transition">
                            +8 cm (ท่วมขัง)
                        </button>
                        <button onclick="setWaterLevelPreset(2)" class="shrink-0 px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 hover:bg-emerald-200 transition">
                            +2 cm (เริ่มปล่อยแห้ง)
                        </button>
                        <button onclick="setWaterLevelPreset(-7)" class="shrink-0 px-2.5 py-1 rounded bg-teal-100 text-teal-800 hover:bg-teal-200 transition">
                            -7 cm (รากเริ่มหายใจ)
                        </button>
                        <button onclick="setWaterLevelPreset(-15)" class="shrink-0 px-2.5 py-1 rounded bg-amber-100 text-amber-800 hover:bg-amber-200 transition font-bold">
                            -15 cm (เกณฑ์สูบน้ำ)
                        </button>
                        <button onclick="setWaterLevelPreset(-20)" class="shrink-0 px-2.5 py-1 rounded bg-rose-100 text-rose-800 hover:bg-rose-200 transition">
                            -20 cm (แห้งวิกฤต)
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right: ESP32-S3 ATD3.5" Smart Screen Live Dashboard Frame -->
            <div class="lg:col-span-5 flex flex-col justify-between">
                
                <div class="lcd-frame rounded-3xl p-4 sm:p-5 text-white flex flex-col justify-between h-full space-y-4">
                    
                    <!-- LCD Top Header Bar -->
                    <div class="flex items-center justify-between border-b border-slate-700/80 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="font-tech text-xs tracking-wider text-cyan-300 font-bold">
                                LEQs-ESP32 ATD 3.5"
                            </span>
                        </div>
                        <div class="flex items-center gap-2 sm:gap-3 text-xs font-mono text-slate-400">
                            <span class="flex items-center gap-1 text-emerald-400 text-[11px] sm:text-xs">
                                <i class="fa-solid fa-battery-three-quarters"></i> 12.6V
                            </span>
                            <span class="flex items-center gap-1 text-cyan-400 text-[11px] sm:text-xs">
                                <i class="fa-solid fa-signal"></i> 4G LTE
                            </span>
                        </div>
                    </div>

                    <!-- Main Dynamic Sensor Readout -->
                    <div class="space-y-4">
                        
                        <!-- Water Level Big Gauge -->
                        <div class="p-3.5 sm:p-4 rounded-2xl bg-slate-900/90 border border-slate-700/60 relative overflow-hidden">
                            <div class="text-[10px] sm:text-[11px] font-mono text-slate-400 uppercase tracking-widest flex items-center justify-between">
                                <span>AWD WATER LEVEL</span>
                                <span id="awdStatusPill" class="px-2 py-0.5 rounded text-[9.5px] sm:text-[10px] bg-emerald-950 text-emerald-300 border border-emerald-500/40">
                                    NORMAL DRYING
                                </span>
                            </div>
                            
                            <div class="flex items-baseline gap-2 mt-2">
                                <span id="lcdWaterLevelNum" class="text-3xl sm:text-4xl md:text-5xl font-black font-tech text-cyan-400 tracking-tight">
                                    -3.5
                                </span>
                                <span class="text-lg sm:text-xl font-mono text-slate-400">cm</span>
                            </div>
                            <div id="lcdWaterLevelSub" class="text-xs text-slate-300 font-mono mt-1">
                                ระดับน้ำอยู่ต่ำกว่าผิวดิน 3.5 เซนติเมตร
                            </div>
                        </div>

                        <!-- Actuator / Solenoid Valve State -->
                        <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 gap-2.5 font-mono">
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-900/90 border border-slate-700/60">
                                <div class="text-[10px] text-slate-400 uppercase">SOLENOID VALVE</div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span id="valveLedDot" class="w-2.5 h-2.5 rounded-full bg-slate-500"></span>
                                    <strong id="valveStateTxt" class="text-xs sm:text-sm font-bold text-slate-300">CLOSED</strong>
                                </div>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-900/90 border border-slate-700/60">
                                <div class="text-[10px] text-slate-400 uppercase">CH₄ SUPPRESSION</div>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <strong id="methaneStatusTxt" class="text-xs sm:text-sm font-bold text-emerald-300">ACTIVE (-48%)</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Telemetry Grid -->
                        <div class="p-3 rounded-xl bg-slate-900/60 border border-slate-800 space-y-2 text-xs font-mono">
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-400">Acoustic Flight Time:</span>
                                <span id="lcdAcousticTime" class="text-cyan-300 font-bold">1,240 µs</span>
                            </div>
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-400">Target Refill Level:</span>
                                <span class="text-teal-300 font-bold">+5.0 cm</span>
                            </div>
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-400">Trigger Threshold:</span>
                                <span class="text-rose-400 font-bold">-15.0 cm</span>
                            </div>
                            <div class="flex justify-between text-slate-300">
                                <span class="text-slate-400">Cloud Sync:</span>
                                <span class="text-emerald-400 flex items-center gap-1">
                                    <i class="fa-solid fa-check-circle"></i> HandySense Server
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- LCD Bottom Status Bar -->
                    <div class="pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400 flex items-center justify-between">
                        <span>FIRMWARE: LEQs-v2.4-AWD</span>
                        <span class="text-emerald-400">SYSTEM OPTIMAL</span>
                    </div>

                </div>

            </div>

        </div>

    </section>
