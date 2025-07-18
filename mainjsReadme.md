تمام يا محمد، هشرحلك الكود سطر بسطر كده باللهجة المصرية علشان تفهم كل حاجة بسهولة:

---

### أول دالة: `toggleTheme`

```js
function toggleTheme() {
```

* دي دالة بتتنده لما المستخدم يضغط على زرار تغيير الثيم (من فاتح لداكن والعكس).

```js
    const body = document.body;
```

* هنا بيجيب عنصر الـ `<body>` علشان يضيف أو يشيل منه الكلاس "dark" حسب الحاجة.

```js
    const themeIcon = document.getElementById('theme-icon');
```

* بيجيب الأيقونة اللي المفروض شكلها يتغير (شمس/قمر) حسب الثيم.

```js
    body.classList.toggle('dark');
```

* لو فيه كلاس `dark` بيشيله، ولو مش موجود بيضيفه. يعني بيبدل بين الوضعين.

```js
    if (body.classList.contains('dark')) {
```

* بيشوف هل الوضع الحالي هو الـ dark mode ولا لأ.

```js
        themeIcon.className = 'fas fa-sun';
```

* لو الوضع dark، يغير الأيقونة لشكل "الشمس" كدلالة على إنه الوضع الليلي شغال.

```js
        localStorage.setItem('theme', 'dark');
```

* وبيسجل في الـ localStorage إن الثيم بقى "dark" علشان يفتكر ده لما تفتح الموقع تاني.

```js
    } else {
```

* لو مش dark mode، يبقى أكيد light mode.

```js
        themeIcon.className = 'fas fa-moon';
```

* يغير الأيقونة لشكل القمر كدلالة على الوضع العادي.

```js
        localStorage.setItem('theme', 'light');
```

* وبيحفظ "light" في الـ localStorage.

```js
}
```

* نهاية الدالة.

---

### تاني دالة: `loadTheme`

```js
function loadTheme() {
```

* دي دالة بتشتغل أول ما الصفحة تفتح، علشان تشوف المستخدم كان مفعّل أنهي ثيم آخر مرة.

```js
    const savedTheme = localStorage.getItem('theme');
```

* بتقرأ الثيم المتسجل في localStorage (dark أو light).

```js
    const themeIcon = document.getElementById('theme-icon');
```

* برضو بتجيب الأيقونة اللي بتتغير حسب الثيم.

```js
    if (savedTheme === 'dark') {
```

* لو المتسجل هو "dark"...

```js
        document.body.classList.add('dark');
```

* تضيف كلاس "dark" على الـ body علشان يشتغل الوضع الليلي.

```js
        themeIcon.className = 'fas fa-sun';
```

* وتخلي الأيقونة شكل الشمس برضو.

```js
    }
}
```

* نهاية الدالة.

---

### رابع جزء: تأثير الموجة (Ripple Effect)

```js
document.addEventListener('click', function(e) {
```

* هنا بيستمع لأي كليك بيحصل في الصفحة.

```js
    if (e.target.classList.contains('btn') || e.target.closest('.btn')) {
```

* لو العنصر اللي اتكلك عليه أو واحد من أهله عنده الكلاس `btn`، كمل.

```js
        const button = e.target.classList.contains('btn') ? e.target : e.target.closest('.btn');
```

* بيحدد بالظبط أنهي عنصر هو الزرار اللي اتكلك عليه.

```js
        const rect = button.getBoundingClientRect();
```

* بيجيب أبعاد الزرار (الموقع والحجم).

```js
        const size = Math.max(rect.width, rect.height);
```

* بيحسب الحجم المناسب للموجة (ياخد الأكبر من العرض والطول).

```js
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
```

* بيحسب مكان بداية الموجة جوه الزرار (مكان الكلك).

```js
        const ripple = document.createElement('span');
```

* بيعمل عنصر جديد `<span>` يمثل الموجة.

```js
        ripple.className = 'ripple';
```

* يديه كلاس اسمه ripple علشان الستايل بتاعه يتطبق.

```js
        ripple.style.width = ripple.style.height = size + 'px';
```

* يخلي الحجم دايرة متساوية العرض والطول.

```js
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
```

* يحدد مكان ظهورها في الزرار.

```js
        button.appendChild(ripple);
```

* يضيف الموجة جوه الزرار.

```js
        setTimeout(() => {
            ripple.remove();
        }, 600);
```

* بعد 600 ميلي ثانية، يشيل الموجة علشان تتكرر لو اتكلك تاني.

```js
    }
});
```

* نهاية الـ click event.

---

### تحميل الثيم مع تحميل الصفحة:

```js
window.addEventListener('load', loadTheme);
```

* أول ما الصفحة تفتح، يشغل دالة `loadTheme` علشان يطبق الثيم المناسب.

---

### إعادة تحميل الصفحة كل 90 ثانية:

```js
setInterval(() => {
    window.location.reload();
}, 90000);
```

* كل 90 ثانية (يعني دقيقة ونص)، الصفحة بتعمل reload تلقائي.

---

لو عايز أشرحلك الجزء بتاع CSS للـ ripple أو الثيم ممكن أساعدك كمان، قولي بس.
