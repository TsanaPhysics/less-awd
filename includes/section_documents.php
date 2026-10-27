    <!-- ========================================================================= -->
    <!-- 12. OFFICIAL PROJECT DOCUMENTS & OPEN SOURCE DOWNLOADS                     -->
    <!-- ========================================================================= -->
    <section id="documents" class="space-y-8 scroll-mt-28">
        
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <span class="px-3.5 py-1 rounded-full bg-purple-100 text-purple-800 text-xs font-bold uppercase tracking-wider font-mono">
                <i class="fa-solid fa-file-arrow-down text-purple-600 mr-1"></i> Technical Manuals &amp; Schematics
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-heading font-extrabold text-gray-900 tracking-tight">
                เอกสารวิชาการ ผังวงจร และคู่มือการประกอบ
            </h2>
            <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                ดาวน์โหลดเอกสาร คู่มือการสร้าง ผังวงจรไฟฟ้า และซอร์สโค้ดเฟิร์มแวร์เพื่อนำไปขยายผลสู่ชุมชน
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4">
            
            <!-- Doc 1 -->
            <div class="glass-card p-5 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl mb-3">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 font-heading mb-1">คู่มือประกอบและติดตั้ง</h3>
                    <div class="text-[11px] text-gray-500 font-mono mb-2">PDF Document • 24 หน้า</div>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ขั้นตอนการเจาะท่อ PVC การติดตั้งหัวโพรบ การเดินสายไฟในกล่องตู้ และการทดสอบระบบก่อนลงแปลง
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100">
                    <a href="HandySense_AWD_Procurement_Guide.md" class="text-xs font-bold text-emerald-700 hover:text-emerald-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-download"></i> ดาวน์โหลดคู่มือ (MD)
                    </a>
                </div>
            </div>

            <!-- Doc 2 -->
            <div class="glass-card p-5 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center text-xl mb-3">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 font-heading mb-1">ผังวงจรไฟฟ้า (Schematic)</h3>
                    <div class="text-[11px] text-gray-500 font-mono mb-2">Wiring Diagram • KiCad / PNG</div>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ผังการต่อสายระหว่าง ESP32, AJ-SR04M, รีเลย์, แผงโซลาร์เซลล์, และแบตเตอรี่ LiFePO4 12V
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100">
                    <button onclick="Swal.fire('ผังวงจรไฟฟ้า', 'ผังวงจร KiCad และแผนภาพการต่อสายไฟสามารถรับได้จากการอบรมเชิงปฏิบัติการของหน่วย LEQs มรภ.รำไพพรรณี หรือติดต่อ ผศ.ดร.ชีวะ 093 742 2654', 'info')" class="text-xs font-bold text-cyan-700 hover:text-cyan-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-eye"></i> ดูแผนภาพวงจร
                    </button>
                </div>
            </div>

            <!-- Doc 3 -->
            <div class="glass-card p-5 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl mb-3">
                        <i class="fa-solid fa-table"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 font-heading mb-1">ใบเสนอราคาและรายการพัสดุ</h3>
                    <div class="text-[11px] text-gray-500 font-mono mb-2">BOM Catalog • Excel / JSON</div>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        ตารางสรุปรายการอุปกรณ์ รหัสสินค้า ร้านค้าผู้จำหน่าย และราคาจริงสำหรับจัดทำเอกสารเบิกจ่ายราชการ
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100">
                    <a href="data/bom_items.json" target="_blank" class="text-xs font-bold text-amber-700 hover:text-amber-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-file-code"></i> ข้อมูล JSON (Data)
                    </a>
                </div>
            </div>

            <!-- Doc 4 -->
            <div class="glass-card p-5 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center text-xl mb-3">
                        <i class="fa-brands fa-github"></i>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 font-heading mb-1">ซอร์สโค้ดเฟิร์มแวร์</h3>
                    <div class="text-[11px] text-gray-500 font-mono mb-2">Arduino C++ • Open Source</div>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        โค้ดควบคุม ESP32 รองรับการเชื่อมต่อ HandySense Open Source Platform และ LINE Notify API
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100">
                    <a href="https://github.com/nectec/handysense" target="_blank" rel="noopener" class="text-xs font-bold text-purple-700 hover:text-purple-900 flex items-center gap-1.5">
                        <i class="fa-solid fa-code-fork"></i> HandySense GitHub
                    </a>
                </div>
            </div>

        </div>

        <!-- Academic Collaboration Banner -->
        <div class="bg-gradient-to-r from-emerald-800 via-teal-900 to-slate-900 text-white rounded-3xl p-6 sm:p-10 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-60 h-60 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <div class="md:col-span-8 space-y-3">
                    <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-mono font-bold uppercase tracking-wider">
                        <i class="fa-solid fa-handshake mr-1.5"></i> Community Engagement &amp; Technology Transfer
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold font-heading text-white">
                        ร่วมพัฒนาและถ่ายทอดเทคโนโลยีสู่แปลงนาชุมชน
                    </h3>
                    <p class="text-sm text-slate-300 leading-relaxed max-w-2xl">
                        หน่วย LEQs คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี ยินดีให้คำปรึกษาแก่กลุ่มวิสาหกิจชุมชน 
                        เกษตรกรแปลงใหญ่ และสถาบันการศึกษา ในการฝึกอบรมประกอบชุด HandySense AWD และการประเมินคาร์บอนเครดิต
                    </p>
                </div>
                <div class="md:col-span-4 flex flex-col sm:flex-row md:flex-col gap-3 justify-center">
                    <a href="tel:0937422654" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-bold text-sm text-center shadow-lg transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <span>โทร. 093 742 2654 (ผศ.ดร.ชีวะ)</span>
                    </a>
                    <button onclick="Swal.fire('ที่อยู่ติดต่อ', 'หน่วยบริการวิเคราะห์สิ่งแวดล้อมเพื่อท้องถิ่น (LEQs) คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี จ.จันทบุรี 22000', 'info')" class="px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm text-center border border-white/20 transition">
                        <i class="fa-solid fa-location-dot mr-1.5"></i> ที่ตั้งหน่วย LEQs จันทบุรี
                    </button>
                </div>
            </div>
        </div>

    </section>
