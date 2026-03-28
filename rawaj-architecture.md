# Rawaj — قرارات المعمارية
> وثيقة حية — تُحدَّث مع كل مرحلة تطوير
> آخر تحديث: مارس 2026

---

## القاعدة الذهبية

> **إذا حذف المستخدم القالب وركّب قالب آخر — هل يجب أن تبقى هذه الوظيفة؟**
> - **نعم** → تنتمي للـ Plugin
> - **لا** → تنتمي للـ Theme

---

## ما يبقى في Rawaj Theme

كل ما يتعلق بالعرض والمظهر **فقط:**

- Templates (FSE) — front-page, shop, product, cart, checkout, account, 404...
- Template Parts — header, footer, mini-cart, product-card
- Block Patterns — 7 patterns عربية جاهزة
- `theme.json` — المصدر الوحيد للحقيقة (ألوان، خطوط، مسافات، Global Styles)
- CSS تجميلي مرتبط بالتصميم فقط
- تسجيل Block Styles (أحجام وأنماط بصرية بديلة للبلوكات)
- `screenshot.png` وأصول التصميم الثابتة

---

## ما يخرج إلى Rawaj Companion Plugin

| الوظيفة | السبب |
|---------|-------|
| استيراد Demo Content | Logic وليس عرضاً — يجب أن يعمل مستقلاً عن القالب |
| إعدادات القالب المتقدمة (Panel) | تبقى محفوظة عند تحديث القالب أو تغييره |
| Block مخصص: عداد العروض Countdown | وظيفة تفاعلية، لا علاقة لها بالعرض |
| Block مخصص: شريط الإعلانات العلوي | محتوى ديناميكي — ليس تصميماً ثابتاً |
| تكامل بوابات دفع عربية (PayTabs، HyperPay) | Integration خارجي |
| إشعارات المخزون والعروض | Business Logic |
| أي Custom Post Type مستقبلاً | وظيفة تبقى مع المحتوى لا مع المظهر |

---

## هيكل Rawaj Companion Plugin

```
rawaj-companion/
├── includes/
│   ├── class-demo-importer.php    — استيراد المحتوى التجريبي
│   ├── class-theme-settings.php   — لوحة الإعدادات المتقدمة
│   ├── class-blocks.php           — تسجيل البلوكات المخصصة
│   └── class-integrations.php     — تكاملات بوابات الدفع
├── blocks/
│   ├── countdown/                 — عداد العروض
│   └── announcement-bar/         — شريط الإعلانات
├── demo/
│   └── content.xml                — محتوى تجريبي عربي جاهز
├── admin/
│   └── settings-page.php
├── languages/
├── rawaj-companion.php            — الملف الرئيسي
└── readme.txt
```

---

## نموذج البيع والتوزيع

| العنصر | التفاصيل |
|--------|----------|
| **Rawaj Theme** | المنتج الرئيسي المدفوع ($49–$129) |
| **Rawaj Companion** | مرفق مجاناً مع كل ترخيص |
| **التوزيع** | يُرسل Plugin مع رابط التنزيل بعد الشراء |

**لماذا مجاناً وليس مدفوعاً؟**
لأن الـ Companion هو جزء لا يتجزأ من تجربة الإعداد — خصوصاً استيراد الـ Demo.
إجباره على الشراء يُعقّد القرار الشرائي ويزيد friction بدون مبرر.

---

## ما لن يُبنى في المرحلة الأولى (عمداً)

| الوظيفة | السبب |
|---------|-------|
| WooCommerce Subscriptions support | تعقيد مبكر — يأتي في v1.1 |
| Multi-vendor marketplace | ليس في نطاق الهدف |
| Booking / Appointments | نيش مختلف |
| Advanced Filtering (AJAX) | Plugin منفصل (FacetWP / Filter Everything) |
| Wishlist | يكفي YITH Wishlist كتوافق |

---

## مبادئ إضافية

- `functions.php` يُستخدم فقط لتحميل الملفات، لا لوضع logic مباشرة فيه
- كل PHP في القالب تحت namespace أو prefix واضح: `rawaj_`
- لا `add_shortcode()` داخل القالب — الـ Shortcodes في الـ Plugin
- لا `wp_enqueue_scripts` لـ JS ثقيل داخل القالب إلا إذا مرتبط بالتصميم
- الـ `theme.json` هو المرجع — لا hardcoded colors في CSS

---

> هذا الملف يُقرأ قبل بدء أي مرحلة تطوير.
> `rawaj-architecture.md` — v1.0 — مارس 2026
