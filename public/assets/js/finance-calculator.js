(function () {
  "use strict";

  // ===== Helpers =====
  const toNum = (v) => {
    if (v == null) return 0;
    const n = parseFloat(String(v).replace(/[^\d.\-]/g, ""));
    return isNaN(n) ? 0 : n;
  };

  // رجّع جميع العناصر المطابقة بالاسم أو id أو data-key/data-name
  // ورتّبها بحيث العنصر "الظاهر" يجي أولاً (وليس hidden)
  function getFields(key) {
    const sel = [
      `[name="${key}"]`,
      `#${CSS.escape(key)}`,
      `[data-key="${key}"]`,
      `[data-name="${key}"]`,
    ].join(",");

    let list = Array.from(document.querySelectorAll(sel));

    // لو ما فيه مطابقات، جرّب مطابقة غير حسّاسة لحالة الأحرف
    if (!list.length) {
      const rx = new RegExp(`^${key}$`, "i");
      list = Array.from(document.querySelectorAll("input")).filter(
        (i) =>
          rx.test(i.name || "") ||
          rx.test(i.id || "") ||
          rx.test(i.getAttribute("data-key") || "") ||
          rx.test(i.getAttribute("data-name") || "")
      );
    }

    if (!list.length) return [];

    // الظاهر (غير hidden وله offsetParent) يجي أولاً
    return list.sort((a, b) => {
      const va = a.type !== "hidden" && a.offsetParent !== null;
      const vb = b.type !== "hidden" && b.offsetParent !== null;
      return va === vb ? 0 : va ? -1 : 1;
    });
  }

  window.getFields = getFields; // للتجربة من الـConsole

  const getVal = (key, def = 0) => {
    const els = getFields(key);
    if (!els.length) return def;
    // نقرأ من أول عنصر ظاهر إن وجد
    const el = els[0];
    return toNum(el.value);
  };

  const setVal = (key, value) => {
    const els = getFields(key);
    if (!els.length) return;
    const val = (Number(toNum(value)) || 0).toFixed(2);
    els.forEach((el) => {
      el.value = val;
      // نفجّر أي listener أو قناع مرتبط
      el.dispatchEvent(new Event("input", { bubbles: true }));
      el.dispatchEvent(new Event("change", { bubbles: true }));
    });
  };

  // ===== الحسابات =====
  function recalcTable() {
    // نسبة الضريبة العامة (TVA%)
    const tva = getVal("TVA", 0);

    let htSum = 0,
      taxSum = 0,
      ttcSum = 0;

    // صفوف الجدول
    document.querySelectorAll(".editable-table tbody tr").forEach((row) => {
      const priceEl = row.querySelector('input[name*="[Price]"]');
      const qtyEl = row.querySelector('input[name*="[Quantity]"]');
      const taxEl = row.querySelector('input[name*="[Tax]"]');
      const totalEl = row.querySelector('input[name*="[Total]"]');
      if (!priceEl || !qtyEl) return;

      const price = toNum(priceEl.value);
      const qty = toNum(qtyEl.value);
      const subHT = price * qty;
      const subTax = subHT * (tva / 100);
      const subTTC = subHT + subTax;

      if (taxEl) taxEl.value = subTax.toFixed(2);
      if (totalEl) totalEl.value = subTTC.toFixed(2);

      htSum += subHT;
      taxSum += subTax;
      ttcSum += subTTC;
    });

    // حقول القسم السفلي
    const reduction = getVal("Reduction", 0);
    const expense = getVal("Expense", 0);
    const gift = getVal("Gift", 0);
    const paidCash = getVal("PaidMonetary", 0);
    const paidOnline = getVal("PaidOnline", 0);

    const ttcFinal = ttcSum + expense - reduction - gift;
    const paid = paidCash + paidOnline;
    const rest = ttcFinal - paid; // الباقي

    // تحديث القيم السفلية — نكتب في كل المطابقات (ظاهر/مخفي)
    setVal("HT", htSum);
    setVal("Tax", taxSum);
    setVal("TTC", ttcFinal);
    setVal("Paid", paid);
    setVal("Rest", rest); // تأكّد أن الحقل اسمه/معرّفه Rest أو data-key="Rest"
  }

  // إتاحتها يدوياً لو احتجت
  window.recalcTable = recalcTable;

  // ===== ربط الأحداث =====
  function bindEvents() {
    const handler = (e) => {
      const n = e.target?.getAttribute("name") || e.target?.id || "";
      if (
        n === "TVA" ||
        n === "Reduction" ||
        n === "Expense" ||
        n === "Gift" ||
        n === "PaidMonetary" ||
        n === "PaidOnline" ||
        n.includes("[Price]") ||
        n.includes("[Quantity]")
      ) {
        recalcTable();
      }
    };

    document.addEventListener("input", handler);
    document.addEventListener("change", handler);

    // تغيّر صفوف الجدول (إضافة/حذف)
    const tbody = document.querySelector(".editable-table tbody");
    if (tbody) {
      new MutationObserver(() => recalcTable()).observe(tbody, {
        childList: true,
        subtree: true,
      });
    }

    // بعض ويدجات الدروب داون تطلق حدثًا مخصصًا
    document.addEventListener("cd:change", recalcTable, true);
  }

  document.addEventListener("DOMContentLoaded", () => {
    bindEvents();
    recalcTable(); // تشغيل أولي
  });

  // احتياط
  window.addEventListener("load", recalcTable);
})();
