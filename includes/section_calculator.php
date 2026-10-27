    <!-- ========================================================================= -->
    <!-- 9. CARBON CREDIT & ROI CALCULATOR                                          -->
    <!-- ========================================================================= -->
    <section id="calculator" class="space-y-8 scroll-mt-28">
        
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider font-mono">
                <i class="fa-solid fa-calculator text-amber-600 mr-1"></i> Economic &amp; Environmental Feasibility
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-heading font-extrabold text-gray-900 tracking-tight">
                เครื่องคำนวณผลตอบแทนและการลดก๊าซเรือนกระจก (ROI &amp; Carbon)
            </h2>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                จำลองการประหยัดค่าน้ำมันสูบน้ำ การลดก๊าซมีเทน และโอกาสสร้างรายได้จากคาร์บอนเครดิตภาคการเกษตร
            </p>
        </div>

        <div class="glass-card rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-lg bg-gradient-to-br from-white via-slate-50 to-emerald-50/30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left: Interactive Sliders & Inputs -->
                <div class="lg:col-span-6 space-y-6">
                    
                    <!-- Rice Area Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-sm font-bold text-gray-800">
                            <label for="calcArea" class="flex items-center gap-2">
                                <i class="fa-solid fa-vector-square text-emerald-600"></i>
                                <span>ขนาดพื้นที่แปลงนาข้าว (ไร่):</span>
                            </label>
                            <span class="font-mono text-emerald-700 bg-emerald-100 px-3 py-1 rounded-xl text-base" id="calcAreaVal">
                                10 ไร่
                            </span>
                        </div>
                        <input type="range" id="calcArea" min="1" max="100" step="1" value="10" 
                               oninput="calculateRoiAndCarbon()"
                               class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-emerald-600">
                        <div class="flex justify-between text-[11px] text-gray-400 font-mono">
                            <span>1 ไร่ (เกษตรรายย่อย)</span>
                            <span>50 ไร่</span>
                            <span>100 ไร่ (นาแปลงใหญ่)</span>
                        </div>
                    </div>

                    <!-- Crop Seasons per Year -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-800 flex items-center gap-2">
                            <i class="fa-solid fa-repeat text-teal-600"></i>
                            <span>จำนวนรอบการทำนาต่อปี:</span>
                        </label>
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" onclick="setCalcRounds(1)" id="btnRound1" class="py-2 rounded-xl text-xs font-bold border border-gray-200 bg-gray-50 text-gray-700 hover:bg-gray-100 transition">
                                1 รอบ (นาปี)
                            </button>
                            <button type="button" onclick="setCalcRounds(2)" id="btnRound2" class="py-2 rounded-xl text-xs font-bold border border-emerald-400 bg-emerald-600 text-white shadow-sm transition">
                                2 รอบ (นาปี+นาปรัง)
                            </button>
                            <button type="button" onclick="setCalcRounds(3)" id="btnRound3" class="py-2 rounded-xl text-xs font-bold border border-gray-200 bg-gray-50 text-gray-700 hover:bg-gray-100 transition">
                                3 รอบ (เขตชลประทาน)
                            </button>
                        </div>
                    </div>

                    <!-- Carbon Price Slider -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-sm font-bold text-gray-800">
                            <label for="calcCarbonPrice" class="flex items-center gap-2">
                                <i class="fa-solid fa-tag text-amber-600"></i>
                                <span>ราคาคาร์บอนเครดิต (บาท / ตัน CO₂e):</span>
                            </label>
                            <span class="font-mono text-amber-700 bg-amber-100 px-3 py-1 rounded-xl text-base" id="calcCarbonPriceVal">
                                450 บาท
                            </span>
                        </div>
                        <input type="range" id="calcCarbonPrice" min="200" max="1000" step="50" value="450" 
                               oninput="calculateRoiAndCarbon()"
                               class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-amber-600">
                        <div class="flex justify-between text-[11px] text-gray-400 font-mono">
                            <span>200 บาท</span>
                            <span>450 บาท (ราคาเฉลี่ย T-VER)</span>
                            <span>1,000 บาท</span>
                        </div>
                    </div>

                </div>

                <!-- Right: Dynamic Calculation Results Cards -->
                <div class="lg:col-span-6 bg-slate-900 text-white rounded-3xl p-6 sm:p-7 shadow-xl space-y-4">
                    
                    <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                        <span class="text-xs font-mono uppercase tracking-wider text-emerald-400 font-bold flex items-center gap-2">
                            <i class="fa-solid fa-chart-pie text-cyan-400"></i> ผลประโยชน์ที่ได้รับต่อปี
                        </span>
                        <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 text-[10px] font-mono">
                            T-VER ESTIMATOR
                        </span>
                    </div>

                    <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 gap-2.5 sm:gap-3">
                        
                        <!-- Water Saved -->
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700">
                            <div class="text-[10px] text-slate-400 uppercase font-mono">น้ำที่ประหยัดได้</div>
                            <div class="text-lg sm:text-xl md:text-2xl font-black font-tech text-cyan-400 my-1" id="resWaterSaved">
                                10,000
                            </div>
                            <div class="text-[10px] text-slate-400">ลบ.ม. / ปี (ลดลง ~40%)</div>
                        </div>

                        <!-- Pumping Fuel Saved -->
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700">
                            <div class="text-[10px] text-slate-400 uppercase font-mono">ค่าน้ำมันสูบน้ำที่ลดได้</div>
                            <div class="text-lg sm:text-xl md:text-2xl font-black font-tech text-emerald-400 my-1" id="resFuelSaved">
                                9,000
                            </div>
                            <div class="text-[10px] text-slate-400">บาท / ปี (ลดรอบสูบน้ำ)</div>
                        </div>

                        <!-- Carbon CH4 Reduced -->
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700">
                            <div class="text-[10px] text-slate-400 uppercase font-mono">ก๊าซมีเทนที่ลดได้</div>
                            <div class="text-lg sm:text-xl md:text-2xl font-black font-tech text-teal-300 my-1" id="resCarbonTons">
                                10.4
                            </div>
                            <div class="text-[10px] text-slate-400">ตัน CO₂e / ปี (-48%)</div>
                        </div>

                        <!-- Carbon Income -->
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700">
                            <div class="text-[10px] text-slate-400 uppercase font-mono">รายได้คาร์บอนเครดิต</div>
                            <div class="text-lg sm:text-xl md:text-2xl font-black font-tech text-amber-300 my-1" id="resCarbonIncome">
                                4,680
                            </div>
                            <div class="text-[10px] text-slate-400">บาท / ปี (ตามราคา T-VER)</div>
                        </div>

                    </div>

                    <!-- Total Financial Benefit & Payback Period -->
                    <div class="p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-emerald-950 to-teal-950 border border-emerald-500/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div>
                            <div class="text-xs text-emerald-300 font-bold">รวมผลประโยชน์สุทธิ:</div>
                            <div class="text-xl sm:text-2xl md:text-3xl font-black font-tech text-emerald-400" id="resTotalBenefit">
                                13,680 บาท/ปี
                            </div>
                        </div>
                        <div class="text-left sm:text-right">
                            <div class="text-[11px] text-slate-300">ระยะเวลาคืนทุน:</div>
                            <div class="text-base font-black font-mono text-amber-300" id="resPaybackMonths">
                                ~3.0 เดือน
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
