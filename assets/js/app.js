/**
 * LEQs-AWD : HandySense Smart Farming - Application Engine
 * Developed for LEQs Center, Rambhai Barni Rajabhat University (RBRU)
 * Faculty of Science & Technology
 */

// Global State
let soundEnabled = true;
let audioCtx = null;
let currentSimulatorMode = 'rice_awd';
let calcRounds = 2;

// Initialize on Load
document.addEventListener('DOMContentLoaded', () => {
    // Initialize calculations, simulator, and mobile bottom navigation
    calculateRoiAndCarbon();
    if (document.getElementById('sliderWaterLevel')) {
        onWaterLevelSliderChange(-3.5);
    }
    initBottomNavScrollSpy();
});

/* ==========================================================================
   1. Web Audio Synthesizer (Sonar Ping, Relay Click, and Warning Beep)
   ========================================================================== */
function getAudioContext() {
    if (!audioCtx) {
        const AudioContextClass = window.AudioContext || window.webkitAudioContext;
        if (AudioContextClass) {
            audioCtx = new AudioContextClass();
        }
    }
    if (audioCtx && audioCtx.state === 'suspended') {
        audioCtx.resume();
    }
    return audioCtx;
}

function playSonarPingAudio() {
    if (!soundEnabled) return;
    try {
        const ctx = getAudioContext();
        if (!ctx) return;

        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        // Sonar frequency chirp (1,400 Hz -> 700 Hz)
        osc.type = 'sine';
        osc.frequency.setValueAtTime(1400, ctx.currentTime);
        osc.frequency.exponentialRampToValueAtTime(700, ctx.currentTime + 0.12);

        gain.gain.setValueAtTime(0.06, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.12);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start();
        osc.stop(ctx.currentTime + 0.12);
    } catch (e) {
        // Autoplay policy fallback
    }
}

function playRelayClickAudio() {
    if (!soundEnabled) return;
    try {
        const ctx = getAudioContext();
        if (!ctx) return;

        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        // Mechanical relay transient snap
        osc.type = 'triangle';
        osc.frequency.setValueAtTime(220, ctx.currentTime);
        osc.frequency.setValueAtTime(80, ctx.currentTime + 0.02);

        gain.gain.setValueAtTime(0.08, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.04);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start();
        osc.stop(ctx.currentTime + 0.04);
    } catch (e) {
        // Fallback
    }
}

function playAlertAlarmAudio() {
    if (!soundEnabled) return;
    try {
        const ctx = getAudioContext();
        if (!ctx) return;

        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        osc.type = 'square';
        osc.frequency.setValueAtTime(880, ctx.currentTime);
        osc.frequency.setValueAtTime(660, ctx.currentTime + 0.1);

        gain.gain.setValueAtTime(0.05, ctx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.25);

        osc.connect(gain);
        gain.connect(ctx.destination);

        osc.start();
        osc.stop(ctx.currentTime + 0.25);
    } catch (e) {
        // Fallback
    }
}

function toggleWebAudioSynth() {
    soundEnabled = !soundEnabled;
    const icon = document.getElementById('synthSoundIcon');
    const label = document.getElementById('synthSoundLabel');
    if (soundEnabled) {
        if (icon) icon.className = 'fa-solid fa-volume-high text-teal-600';
        if (label) label.textContent = 'เสียงคลื่นโซนาร์: เปิด';
        playSonarPingAudio();
    } else {
        if (icon) icon.className = 'fa-solid fa-volume-xmark text-gray-400';
        if (label) label.textContent = 'เสียงคลื่นโซนาร์: ปิด';
    }
}

/* ==========================================================================
   2. Interactive Simulator (AWD Rice & Durian VPD)
   ========================================================================== */
function switchSimulatorMode(mode) {
    currentSimulatorMode = mode;
    const btnRice = document.getElementById('btnModeRice');
    const btnDurian = document.getElementById('btnModeDurian');

    if (mode === 'rice_awd') {
        if (btnRice) {
            btnRice.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition bg-emerald-600 text-white shadow-sm flex items-center gap-1.5';
        }
        if (btnDurian) {
            btnDurian.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition text-gray-600 hover:text-gray-900 flex items-center gap-1.5';
        }
        onWaterLevelSliderChange(-3.5);
    } else {
        if (btnRice) {
            btnRice.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition text-gray-600 hover:text-gray-900 flex items-center gap-1.5';
        }
        if (btnDurian) {
            btnDurian.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition bg-amber-600 text-white shadow-sm flex items-center gap-1.5';
        }
        // Durian VPD preset
        onWaterLevelSliderChange(-10.0);
    }
    playSonarPingAudio();
}

function setWaterLevelPreset(val) {
    const slider = document.getElementById('sliderWaterLevel');
    if (slider) {
        slider.value = val;
    }
    onWaterLevelSliderChange(val);
}

let lastValveState = 'CLOSED';

function onWaterLevelSliderChange(val) {
    val = parseFloat(val);

    // Update Slider Badge
    const badge = document.getElementById('sliderWaterLevelVal');
    if (badge) {
        badge.textContent = (val > 0 ? '+' : '') + val.toFixed(1) + ' cm';
    }

    // Geometry Calculation:
    // Ground level Y = 150. Level cm maps: Y = 150 - (val * 4.5)
    const waterY = 150 - (val * 4.5);
    const clampedY = Math.max(90, Math.min(270, waterY));
    const waterHeight = 380 - clampedY;

    // SVG Updates
    const svgWaterRect = document.getElementById('svgWaterRect');
    const svgWaterLine = document.getElementById('svgWaterLine');
    const svgWaterDimLine = document.getElementById('svgWaterDimLine');
    const svgLevelTxt = document.getElementById('svgLevelTxt');
    const svgEchoTimeTxt = document.getElementById('svgEchoTimeTxt');

    if (svgWaterRect) {
        svgWaterRect.setAttribute('y', clampedY);
        svgWaterRect.setAttribute('height', waterHeight);
    }
    if (svgWaterLine) {
        svgWaterLine.setAttribute('y1', clampedY);
        svgWaterLine.setAttribute('y2', clampedY);
    }
    if (svgWaterDimLine) {
        svgWaterDimLine.setAttribute('y2', clampedY);
    }

    // Calculate Acoustic Echo Time: Speed of Sound ~343 m/s = 0.0343 cm/us
    // Distance from probe (Y=40 cm equivalent to +24.4 cm) to water level
    const probeElevation = 24.4; // cm above ground
    const distanceToWaterCm = probeElevation - val;
    const timeUs = Math.round((distanceToWaterCm * 2 / 0.0343));

    if (svgLevelTxt) {
        svgLevelTxt.textContent = `ระดับน้ำ: ${(val > 0 ? '+' : '') + val.toFixed(1)} cm`;
    }
    if (svgEchoTimeTxt) {
        svgEchoTimeTxt.textContent = `${timeUs} µs`;
    }

    // Smart Screen LCD Frame Updates
    const lcdNum = document.getElementById('lcdWaterLevelNum');
    const lcdSub = document.getElementById('lcdWaterLevelSub');
    const statusPill = document.getElementById('awdStatusPill');
    const valveDot = document.getElementById('valveLedDot');
    const valveTxt = document.getElementById('valveStateTxt');
    const methaneTxt = document.getElementById('methaneStatusTxt');
    const acousticTime = document.getElementById('lcdAcousticTime');

    if (lcdNum) {
        lcdNum.textContent = (val > 0 ? '+' : '') + val.toFixed(1);
    }
    if (acousticTime) {
        acousticTime.textContent = `${timeUs.toLocaleString('th-TH')} µs`;
    }

    // AWD Logic:
    // If water level <= -15.0 cm -> trigger valve OPEN
    // If water level >= 5.0 cm -> trigger valve CLOSED
    let currentValve = 'CLOSED';
    if (val <= -15.0) {
        currentValve = 'OPEN';
        if (lcdSub) lcdSub.textContent = 'น้ำลดถึงเกณฑ์วิกฤต (-15 cm) เปิดวาล์วเติมน้ำอัตโนมัติ';
        if (statusPill) {
            statusPill.className = 'px-2 py-0.5 rounded text-[10px] bg-rose-950 text-rose-300 border border-rose-500/40 font-bold';
            statusPill.textContent = 'REFILL TRIGGERED';
        }
        if (valveDot) valveDot.className = 'w-3 h-3 rounded-full bg-emerald-400 animate-pulse';
        if (valveTxt) {
            valveTxt.className = 'text-sm font-bold text-emerald-400';
            valveTxt.textContent = 'OPEN (ให้น้ำ)';
        }
        if (lastValveState !== 'OPEN') {
            playRelayClickAudio();
            playAlertAlarmAudio();
        }
    } else if (val >= 5.0) {
        currentValve = 'CLOSED';
        if (lcdSub) lcdSub.textContent = 'ระดับน้ำท่วมขังตามเกณฑ์ (+5 cm) ปิดวาล์วน้ำ';
        if (statusPill) {
            statusPill.className = 'px-2 py-0.5 rounded text-[10px] bg-sky-950 text-sky-300 border border-sky-500/40';
            statusPill.textContent = 'FLOODED STAGE';
        }
        if (valveDot) valveDot.className = 'w-3 h-3 rounded-full bg-slate-500';
        if (valveTxt) {
            valveTxt.className = 'text-sm font-bold text-slate-300';
            valveTxt.textContent = 'CLOSED';
        }
        if (lastValveState === 'OPEN') {
            playRelayClickAudio();
        }
    } else {
        currentValve = 'CLOSED';
        if (val < 0) {
            if (lcdSub) lcdSub.textContent = `น้ำใต้ดินลดลง ${Math.abs(val).toFixed(1)} cm (ช่วงรากข้าวหายใจ)`;
            if (statusPill) {
                statusPill.className = 'px-2 py-0.5 rounded text-[10px] bg-emerald-950 text-emerald-300 border border-emerald-500/40';
                statusPill.textContent = 'AWD DRYING PHASE';
            }
        } else {
            if (lcdSub) lcdSub.textContent = `น้ำท่วมผิวดิน +${val.toFixed(1)} cm (กำลังระบาย/ปล่อยแห้ง)`;
            if (statusPill) {
                statusPill.className = 'px-2 py-0.5 rounded text-[10px] bg-teal-950 text-teal-300 border border-teal-500/40';
                statusPill.textContent = 'SATURATED';
            }
        }
        if (valveDot) valveDot.className = 'w-3 h-3 rounded-full bg-slate-500';
        if (valveTxt) {
            valveTxt.className = 'text-sm font-bold text-slate-300';
            valveTxt.textContent = 'CLOSED';
        }
    }

    lastValveState = currentValve;

    // Methane Suppression Status
    if (methaneTxt) {
        if (val <= 0) {
            methaneTxt.className = 'text-sm font-bold text-emerald-300';
            methaneTxt.textContent = 'ACTIVE (-48%)';
        } else {
            methaneTxt.className = 'text-sm font-bold text-amber-300';
            methaneTxt.textContent = 'ANAEROBIC (มีน้ำขัง)';
        }
    }

    // Sync Sensor Telemetry Modal if loaded
    updateModalSensorDisplay(val);
}

/* ==========================================================================
   3. BOM Category Filtering & Image Preview Modals
   ========================================================================== */
function filterBomCategory(category) {
    const tabs = ['bomTabAll', 'bomTabSensor', 'bomTabMcu', 'bomTabPower', 'bomTabBox'];
    tabs.forEach(tabId => {
        const el = document.getElementById(tabId);
        if (el) {
            el.className = 'shrink-0 px-3.5 py-2 rounded-xl transition bg-gray-100 text-gray-700 hover:bg-gray-200';
        }
    });

    // Set Active Button
    let activeTabId = 'bomTabAll';
    if (category === 'sensor') activeTabId = 'bomTabSensor';
    else if (category === 'mcu') activeTabId = 'bomTabMcu';
    else if (category === 'power') activeTabId = 'bomTabPower';
    else if (category === 'enclosure') activeTabId = 'bomTabBox';

    const activeEl = document.getElementById(activeTabId);
    if (activeEl) {
        activeEl.className = 'shrink-0 px-3.5 py-2 rounded-xl transition bg-emerald-600 text-white shadow-sm';
    }

    // Filter Rows
    const rows = document.querySelectorAll('.bom-row');
    rows.forEach(row => {
        if (category === 'all' || row.getAttribute('data-category') === category) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });

    // Filter Cards
    const cards = document.querySelectorAll('.bom-card');
    cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

function switchBomViewMode(mode) {
    const tableView = document.getElementById('bomTableView');
    const galleryView = document.getElementById('bomGalleryView');
    const btnTable = document.getElementById('btnViewTable');
    const btnGallery = document.getElementById('btnViewGallery');

    if (mode === 'gallery') {
        if (galleryView) galleryView.classList.remove('hidden');
        if (tableView) tableView.classList.add('hidden');
        if (btnGallery) btnGallery.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition bg-emerald-600 text-white shadow-xs flex items-center gap-1.5';
        if (btnTable) btnTable.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition text-gray-600 hover:text-gray-900 flex items-center gap-1.5';
    } else {
        if (tableView) tableView.classList.remove('hidden');
        if (galleryView) galleryView.classList.add('hidden');
        if (btnTable) btnTable.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition bg-emerald-600 text-white shadow-xs flex items-center gap-1.5';
        if (btnGallery) btnGallery.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition text-gray-600 hover:text-gray-900 flex items-center gap-1.5';
    }
}

function previewBomImage(title, imgSrc, spec, priceRange, typicalPrice, supplier, url, notes) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: `<div class="text-base sm:text-lg font-extrabold font-heading text-gray-900 leading-snug">${title}</div>`,
            html: `
                <div class="space-y-4 text-left pt-2 text-xs sm:text-sm">
                    <div class="relative rounded-2xl overflow-hidden border border-gray-200 bg-gray-50 flex items-center justify-center p-3 group">
                        <img src="${imgSrc}" alt="${title}" class="max-h-64 sm:max-h-72 w-auto object-contain rounded-xl shadow-xs transition duration-300 group-hover:scale-105" onerror="this.src='assets/images/nong_ileqs.png'">
                    </div>
                    
                    <div class="p-3 bg-emerald-50/80 rounded-xl border border-emerald-200 space-y-1">
                        <div class="text-[11px] font-bold text-emerald-800 uppercase tracking-wider font-mono">
                            <i class="fa-solid fa-sliders mr-1"></i> คุณสมบัติทางเทคนิค (Specifications)
                        </div>
                        <div class="text-gray-700 leading-relaxed">${spec || '-'}</div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 text-center">
                        <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                            <div class="text-[10px] text-gray-500 font-mono">ช่วงราคาจริงในไทย</div>
                            <div class="text-sm sm:text-base font-bold text-emerald-700 font-mono">${priceRange || '-'}</div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-amber-50 border border-amber-200">
                            <div class="text-[10px] text-amber-800 font-mono">ราคาเฉลี่ยกลาง</div>
                            <div class="text-sm sm:text-base font-bold text-amber-900 font-mono">${typicalPrice || '-'}</div>
                        </div>
                    </div>

                    ${notes ? `
                    <div class="p-2.5 bg-blue-50/70 rounded-xl border border-blue-200 text-[11px] text-blue-900 flex items-start gap-2">
                        <i class="fa-solid fa-circle-info text-blue-600 mt-0.5 shrink-0"></i>
                        <span>${notes}</span>
                    </div>` : ''}

                    <div class="flex items-center justify-between text-xs pt-1 border-t border-gray-100">
                        <span class="text-gray-500">แหล่งซื้อแนะนำ: <strong class="text-gray-800">${supplier || '-'}</strong></span>
                        ${url ? `<a href="${url}" target="_blank" rel="noopener" class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white font-bold hover:bg-emerald-700 transition flex items-center gap-1 text-[11px]"><i class="fa-solid fa-cart-shopping"></i> ไปยังร้านค้า</a>` : ''}
                    </div>
                </div>
            `,
            showCloseButton: true,
            showConfirmButton: true,
            confirmButtonText: 'ปิดหน้าต่าง',
            confirmButtonColor: '#059669',
            customClass: {
                popup: 'rounded-3xl p-5 max-w-lg',
            }
        });
    } else {
        window.open(imgSrc, '_blank');
    }
}

function previewAssemblyDiagram(type) {
    const isParts = type === 'parts';
    const title = isParts ? 'แผนผังชิ้นส่วนอุปกรณ์ HandySense-AWD ทั้ง 15 รายการ' : 'ไดอะแกรมการติดตั้งอุปกรณ์จริงในแปลงนาเปียกสลับแห้ง (AWD Field Installation)';
    const imgSrc = isParts ? 'assets/images/bom/assembly_parts.jpg' : 'assets/images/bom/assembly_install.jpg';
    const desc = isParts ? 'แสดงการแยกชิ้นส่วนตาม 4 หมวดหลัก: เซนเซอร์, ไมโครคอนโทรลเลอร์ ESP32 และจอ LCD, โซลาร์เซลล์ และตู้กันน้ำ IP65' : 'จำลองการติดตั้งท่อสังเกตการณ์ลึก 20 cm, ตู้ควบคุมโซลาร์เซลล์ข้างคันนา และโซลินอยด์วาล์วปล่อยน้ำเข้าแปลงนา';

    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: `<div class="text-base sm:text-lg font-extrabold font-heading text-gray-900 leading-snug">${title}</div>`,
            html: `
                <div class="space-y-3 text-left pt-2 text-xs sm:text-sm">
                    <div class="rounded-2xl overflow-hidden border border-gray-200 bg-slate-900 flex items-center justify-center p-2">
                        <img src="${imgSrc}" alt="${title}" class="max-h-96 w-full object-contain rounded-xl shadow-md">
                    </div>
                    <p class="text-xs text-gray-600 leading-relaxed bg-slate-50 p-2.5 rounded-xl border border-gray-200">
                        <i class="fa-solid fa-circle-check text-emerald-600 mr-1"></i> ${desc}
                    </p>
                </div>
            `,
            showCloseButton: true,
            confirmButtonText: 'ปิดหน้าต่าง',
            confirmButtonColor: '#059669',
            customClass: {
                popup: 'rounded-3xl p-5 max-w-2xl',
            }
        });
    } else {
        window.open(imgSrc, '_blank');
    }
}

/* ==========================================================================
   4. Carbon Credit & ROI Calculator
   ========================================================================== */
function setCalcRounds(rounds) {
    calcRounds = rounds;
    ['btnRound1', 'btnRound2', 'btnRound3'].forEach((id, idx) => {
        const btn = document.getElementById(id);
        if (btn) {
            if (idx + 1 === rounds) {
                btn.className = 'py-2 rounded-xl text-xs font-bold border border-emerald-400 bg-emerald-600 text-white shadow-sm transition';
            } else {
                btn.className = 'py-2 rounded-xl text-xs font-bold border border-gray-200 bg-gray-50 text-gray-700 hover:bg-gray-100 transition';
            }
        }
    });
    calculateRoiAndCarbon();
}

function calculateRoiAndCarbon() {
    const areaInput = document.getElementById('calcArea');
    const priceInput = document.getElementById('calcCarbonPrice');

    const area = areaInput ? parseInt(areaInput.value) : 10;
    const price = priceInput ? parseInt(priceInput.value) : 450;

    // Badges update
    const areaVal = document.getElementById('calcAreaVal');
    const priceVal = document.getElementById('calcCarbonPriceVal');
    if (areaVal) areaVal.textContent = `${area} ไร่`;
    if (priceVal) priceVal.textContent = `${price} บาท`;

    // Agronomy Benchmark Data:
    // 1. Water savings: ~500 m3 / rai / round
    const waterSaved = area * 500 * calcRounds;

    // 2. Pumping fuel savings: ~450 Baht / rai / round (reduced 3-4 pumping cycles)
    const fuelSaved = area * 450 * calcRounds;

    // 3. Methane reduction: ~0.52 tCO2e / rai / round (T-VER rice methodology)
    const carbonTons = area * 0.52 * calcRounds;

    // 4. Carbon credit income
    const carbonIncome = Math.round(carbonTons * price);

    // 5. Total Net Benefit
    const totalBenefit = fuelSaved + carbonIncome;

    // 6. Payback Period (Months) based on in-house hardware BOM range (3,030 - 5,010 Baht, typical 3,630 Baht)
    // Note: Excludes cloud server, custom app dev, and database storage
    const kitCostTypical = 3630;
    const kitCostMin = 3030;
    const kitCostMax = 5010;
    const paybackMonths = totalBenefit > 0 ? (kitCostTypical / (totalBenefit / 12)).toFixed(1) : 0;
    const paybackMin = totalBenefit > 0 ? (kitCostMin / (totalBenefit / 12)).toFixed(1) : 0;
    const paybackMax = totalBenefit > 0 ? (kitCostMax / (totalBenefit / 12)).toFixed(1) : 0;

    // Update UI elements
    const resWater = document.getElementById('resWaterSaved');
    const resFuel = document.getElementById('resFuelSaved');
    const resCarbon = document.getElementById('resCarbonTons');
    const resIncome = document.getElementById('resCarbonIncome');
    const resTotal = document.getElementById('resTotalBenefit');
    const resPayback = document.getElementById('resPaybackMonths');

    if (resWater) resWater.textContent = waterSaved.toLocaleString('th-TH');
    if (resFuel) resFuel.textContent = fuelSaved.toLocaleString('th-TH');
    if (resCarbon) resCarbon.textContent = carbonTons.toFixed(1);
    if (resIncome) resIncome.textContent = carbonIncome.toLocaleString('th-TH');
    if (resTotal) resTotal.textContent = `${totalBenefit.toLocaleString('th-TH')} บาท/ปี`;
    if (resPayback) resPayback.textContent = `~${paybackMonths} เดือน (${paybackMin}-${paybackMax} ด.)`;
}

/* ==========================================================================
   5. Sunshine High-Contrast Outdoor Field Mode
   ========================================================================== */
function toggleSunshineMode() {
    document.body.classList.toggle('sunshine-mode');
    const isSunshine = document.body.classList.contains('sunshine-mode');
    const btn = document.getElementById('sunshineToggleBtn');
    if (btn) {
        if (isSunshine) {
            btn.className = 'px-2.5 py-1.5 text-xs font-bold rounded-xl border border-black bg-black text-white transition flex items-center gap-1.5 shadow-md';
            btn.innerHTML = '<i class="fa-solid fa-moon text-amber-300"></i><span class="hidden sm:inline">โหมดปกติ</span>';
        } else {
            btn.className = 'px-2.5 py-1.5 text-xs font-bold rounded-xl border border-amber-300 bg-amber-50 text-amber-800 hover:bg-amber-100 transition flex items-center gap-1.5 shadow-sm';
            btn.innerHTML = '<i class="fa-solid fa-sun text-amber-500 animate-spin-slow"></i><span class="hidden sm:inline">โหมดแดดจ้า</span>';
        }
    }
}

/* ==========================================================================
   6. Mobile Navigation Controls
   ========================================================================== */
function toggleMobileMenu() {
    const drawer = document.getElementById('mobileDrawer');
    const icon = document.getElementById('mobileMenuIcon');
    if (drawer) {
        drawer.classList.toggle('hidden');
        const isOpen = !drawer.classList.contains('hidden');
        if (icon) {
            icon.className = isOpen ? 'fa-solid fa-xmark text-lg' : 'fa-solid fa-bars text-lg';
        }
    }
}

function closeMobileMenu() {
    const drawer = document.getElementById('mobileDrawer');
    const icon = document.getElementById('mobileMenuIcon');
    if (drawer) {
        drawer.classList.add('hidden');
        if (icon) icon.className = 'fa-solid fa-bars text-lg';
    }
}

/* ==========================================================================
   7. Modals & AI Assistant Dialog (Nong iLEQs 🤖)
   ========================================================================== */
function openProcurementModal() {
    const modal = document.getElementById('procurementModal');
    if (modal) modal.classList.remove('hidden');
}

function closeProcurementModal() {
    const modal = document.getElementById('procurementModal');
    if (modal) modal.classList.add('hidden');
}

function openIleqsModal() {
    const modal = document.getElementById('ileqsModal') || document.getElementById('smartScienceModal');
    if (modal) modal.classList.remove('hidden');
}

function closeIleqsModal() {
    const modal = document.getElementById('ileqsModal') || document.getElementById('smartScienceModal');
    if (modal) modal.classList.add('hidden');
}

function askIleqs(topic) {
    const box = document.getElementById('ileqsAnswer') || document.getElementById('smartScienceAnswer');
    if (!box) return;

    box.classList.remove('hidden');
    if (topic === 'awd_depth') {
        box.innerHTML = '<strong>น้อง iLEQs แนะนำ:</strong> ท่อสังเกตการณ์ฝังลึก 20-25 ซม. เกณฑ์น้ำแห้งที่ปลอดภัยคือ -15 ซม. จากผิวดิน เป็นระดับที่รากข้าวยังดูดน้ำได้เต็มที่ผ่านแรงดึงของเม็ดดิน โดยไม่เกิดความเครียดจากการขาดน้ำครับ';
    } else if (topic === 'ch4_reduction') {
        box.innerHTML = '<strong>น้อง iLEQs ตอบ:</strong> ลดได้จริงครับ! จากงานวิจัยของศูนย์ LEQs มรภ.รำไพพรรณี และกรมการข้าว การปล่อยให้น้ำแห้งจะทำให้ออกซิเจนซึมลงสู่ชั้นดิน ยับยั้งแบคทีเรียไม่ใช้ออกซิเจน (Methanogen) ทำให้ลดการปล่อยก๊าซมีเทนได้เฉลี่ย 48% ทันทีครับ';
    } else if (topic === 'contact_chewa') {
        box.innerHTML = '<strong>น้อง iLEQs แนะนำช่องทางติดต่อ:</strong> สามารถโทรติดต่อ ผศ.ดร.ชีวะ ทัศนา (ฝ่ายวิจัยระบบ AIoT หน่วย LEQs) ได้โดยตรงที่หมายเลข <strong>093 742 2654</strong> หรือศูนย์ LEQs อาคาร 35 คณะวิทยาศาสตร์และเทคโนโลยี มรภ.รำไพพรรณี ครับ';
    }
}

// Global Aliases for Compatibility
window.openIleqsModal = openIleqsModal;
window.closeIleqsModal = closeIleqsModal;
window.askIleqs = askIleqs;
window.openSmartScienceModal = openIleqsModal;
window.closeSmartScienceModal = closeIleqsModal;
window.askSmartScience = askIleqs;

/* ==========================================================================
   8. Live Sensor Telemetry Modal & Smartphone 3D Bottom Dock Engine
   ========================================================================== */
function openSensorDataModal() {
    const modal = document.getElementById('sensorTelemetryModal');
    if (modal) {
        modal.classList.remove('hidden');
        playSonarPingAudio();

        // Sync modal slider and values with current slider value
        const mainSlider = document.getElementById('sliderWaterLevel');
        const currentVal = mainSlider ? parseFloat(mainSlider.value) : -3.5;
        const modalSlider = document.getElementById('modalWaterSlider');
        if (modalSlider) modalSlider.value = currentVal;
        updateModalSensorDisplay(currentVal);
    }
}

function closeSensorDataModal() {
    const modal = document.getElementById('sensorTelemetryModal');
    if (modal) modal.classList.add('hidden');
}

function switchModalSensorTab(tab) {
    const simView = document.getElementById('modalSensorSimView');
    const realView = document.getElementById('modalSensorRealView');
    const btnSim = document.getElementById('btnModalModeSim');
    const btnReal = document.getElementById('btnModalModeReal');

    if (tab === 'real') {
        if (simView) simView.classList.add('hidden');
        if (realView) realView.classList.remove('hidden');
        if (btnReal) btnReal.className = 'flex-1 py-2 px-3 rounded-xl transition bg-emerald-600 text-white shadow-xs flex items-center justify-center gap-1.5';
        if (btnSim) btnSim.className = 'flex-1 py-2 px-3 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center justify-center gap-1.5';
        playSonarPingAudio();
    } else {
        if (realView) realView.classList.add('hidden');
        if (simView) simView.classList.remove('hidden');
        if (btnSim) btnSim.className = 'flex-1 py-2 px-3 rounded-xl transition bg-emerald-600 text-white shadow-xs flex items-center justify-center gap-1.5';
        if (btnReal) btnReal.className = 'flex-1 py-2 px-3 rounded-xl transition text-slate-600 hover:text-slate-900 flex items-center justify-center gap-1.5';
    }
}

function onModalSliderChange(val) {
    const num = parseFloat(val);
    updateModalSensorDisplay(num);
    const mainSlider = document.getElementById('sliderWaterLevel');
    if (mainSlider) {
        mainSlider.value = num;
        onWaterLevelSliderChange(num);
    }
}

function updateModalSensorDisplay(val) {
    const valWater = document.getElementById('modalSensorWaterVal');
    const valSlider = document.getElementById('modalSliderValueLabel');
    const valDist = document.getElementById('modalSensorDistVal');
    const valValve = document.getElementById('modalSensorValveTxt');
    const valMethane = document.getElementById('modalSensorMethaneVal');
    const pill = document.getElementById('modalSensorStagePill');
    const bar = document.getElementById('modalSensorWaterBar');

    const formatted = (val > 0 ? '+' : '') + val.toFixed(1);
    if (valWater) valWater.textContent = formatted;
    if (valSlider) valSlider.textContent = `${formatted} cm`;

    // Distance: probe is 24.4 cm above ground, distance = 24.4 - val
    const dist = (24.4 - val).toFixed(1);
    if (valDist) valDist.textContent = `${dist} cm`;

    // Bar percentage: range -20 to +10 (span 30)
    const pct = Math.max(5, Math.min(100, Math.round(((val + 20) / 30) * 100)));
    if (bar) bar.style.width = `${pct}%`;

    if (val <= -15.0) {
        if (valValve) {
            valValve.className = 'text-lg sm:text-xl font-bold font-mono text-emerald-400 animate-pulse';
            valValve.textContent = 'OPEN (ให้น้ำ)';
        }
        if (pill) {
            pill.className = 'px-2 py-0.5 rounded text-[10px] font-bold bg-rose-950 text-rose-300 border border-rose-500/40';
            pill.textContent = 'REFILL TRIGGERED';
        }
    } else if (val >= 5.0) {
        if (valValve) {
            valValve.className = 'text-lg sm:text-xl font-bold font-mono text-slate-300';
            valValve.textContent = 'CLOSED (ปิดสนิท)';
        }
        if (pill) {
            pill.className = 'px-2 py-0.5 rounded text-[10px] font-bold bg-sky-950 text-sky-300 border border-sky-500/40';
            pill.textContent = 'FLOODED STAGE';
        }
    } else {
        if (valValve) {
            valValve.className = 'text-lg sm:text-xl font-bold font-mono text-slate-300';
            valValve.textContent = 'CLOSED (ช่วงแห้ง)';
        }
        if (pill) {
            pill.className = 'px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-950 text-emerald-300 border border-emerald-500/40';
            pill.textContent = 'AWD DRYING PHASE';
        }
    }

    if (valMethane) {
        if (val <= 0) {
            valMethane.className = 'text-sm sm:text-base font-bold text-emerald-800';
            valMethane.textContent = '-48% ACTIVE';
        } else {
            valMethane.className = 'text-sm sm:text-base font-bold text-amber-800';
            valMethane.textContent = '0% (ANAEROBIC)';
        }
    }
}

function simulateBleScan() {
    const btn = document.getElementById('btnScanBle');
    const badge = document.getElementById('bleStatusBadge');
    const result = document.getElementById('bleScanResult');

    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> กำลังสแกนหา ESP32-S3 BLE ในรัศมี 30 เมตร...';
    }
    if (badge) {
        badge.className = 'px-2 py-0.5 rounded-full bg-amber-200 text-amber-900 text-[10px] font-mono font-bold animate-pulse';
        badge.textContent = 'SCANNING...';
    }
    playSonarPingAudio();

    setTimeout(() => {
        if (result) result.classList.remove('hidden');
        if (badge) {
            badge.className = 'px-2 py-0.5 rounded-full bg-emerald-200 text-emerald-900 text-[10px] font-mono font-bold';
            badge.textContent = 'CONNECTED (BLE 5.0)';
        }
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-circle-check text-emerald-300 mr-1.5"></i> เชื่อมต่อสำเร็จ (แตะเพื่อสแกนใหม่)';
        }
        playRelayClickAudio();
    }, 1200);
}

// Bottom Nav Active Item ScrollSpy
function initBottomNavScrollSpy() {
    const sections = [
        { id: 'hero', navId: 'navItemHome' },
        { id: 'bom', navId: 'navItemBom' },
        { id: 'calculator', navId: 'navItemCalc' },
        { id: 'teams', navId: 'navItemTeams' }
    ];

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        sections.forEach(({ id, navId }) => {
            const el = document.getElementById(id);
            const navEl = document.getElementById(navId);
            if (el && navEl) {
                const top = el.offsetTop - 200;
                const bottom = top + el.offsetHeight;
                const dot = navEl.querySelector('.nav-dot');
                const label = navEl.querySelector('span:not(.nav-dot)');

                if (scrollY >= top && scrollY < bottom) {
                    if (dot) dot.classList.replace('opacity-0', 'opacity-100');
                    if (label) {
                        label.classList.add('font-bold', 'text-emerald-800');
                        label.classList.remove('font-semibold', 'text-slate-600');
                    }
                } else {
                    if (dot) dot.classList.replace('opacity-100', 'opacity-0');
                    if (label) {
                        label.classList.remove('font-bold', 'text-emerald-800');
                        label.classList.add('font-semibold', 'text-slate-600');
                    }
                }
            }
        });
    }, { passive: true });
}

