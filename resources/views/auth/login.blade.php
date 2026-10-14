<!DOCTYPE html>
<html class="h-full" lang="es">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Iniciar Sesión · FisioalephPro</title>
<!-- Google Fonts & Material Symbols -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration -->
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "on-primary-fixed-variant": "#004f50",
            "background": "#f9f9ff",
            "on-secondary-fixed": "#001d31",
            "secondary": "#366285",
            "primary-fixed-dim": "#6fd7d6",
            "on-error-container": "#93000a",
            "on-tertiary-container": "#f7feff",
            "tertiary": "#006671",
            "surface": "#f9f9ff",
            "surface-container-low": "#f0f3ff",
            "on-background": "#121c2c",
            "tertiary-container": "#00818f",
            "on-secondary-fixed-variant": "#1a4a6c",
            "inverse-primary": "#6fd7d6",
            "primary-container": "#008282",
            "on-primary-container": "#f3fffe",
            "surface-bright": "#f9f9ff",
            "inverse-surface": "#273141",
            "surface-container-highest": "#d9e3f9",
            "secondary-fixed-dim": "#a0cbf3",
            "secondary-fixed": "#cce5ff",
            "on-secondary-container": "#305e80",
            "error-container": "#ffdad6",
            "on-secondary": "#ffffff",
            "primary-fixed": "#8df3f3",
            "secondary-container": "#abd6ff",
            "outline": "#6d7979",
            "inverse-on-surface": "#ebf1ff",
            "tertiary-fixed-dim": "#45d8ed",
            "surface-tint": "#006a6a",
            "on-surface-variant": "#3d4949",
            "on-error": "#ffffff",
            "outline-variant": "#bcc9c8",
            "surface-dim": "#d0daf0",
            "on-tertiary-fixed": "#001f24",
            "on-primary-fixed": "#002020",
            "tertiary-fixed": "#98f0ff",
            "on-tertiary-fixed-variant": "#004f58",
            "on-primary": "#ffffff",
            "surface-container-lowest": "#ffffff",
            "error": "#ba1a1a",
            "primary": "#006767",
            "on-surface": "#121c2c",
            "surface-container-high": "#dee8ff",
            "on-tertiary": "#ffffff",
            "surface-container": "#e7eeff",
            "surface-variant": "#d9e3f9"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "spacing": {
            "space-xs": "0.25rem",
            "space-xl": "2.5rem",
            "space-lg": "1.5rem",
            "gutter": "1.5rem",
            "margin-mobile": "1rem",
            "space-sm": "0.5rem",
            "margin": "2rem",
            "space-md": "1rem",
            "gutter-mobile": "0.75rem"
          },
          "fontFamily": {
            "body-lg": ["Inter"],
            "label-lg": ["Inter"],
            "headline-xl-mobile": ["Montserrat"],
            "headline-md": ["Montserrat"],
            "body-md": ["Inter"],
            "label-sm": ["Inter"],
            "headline-xl": ["Montserrat"],
            "body-sm": ["Inter"],
            "label-md": ["Inter"],
            "headline-lg": ["Montserrat"],
            "headline-sm": ["Montserrat"],
            "headline-lg-mobile": ["Montserrat"]
          },
          "fontSize": {
            "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
            "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }],
            "headline-xl-mobile": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
            "headline-md": ["22px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
            "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
            "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "600" }],
            "headline-xl": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
            "body-sm": ["13px", { "lineHeight": "18px", "fontWeight": "400" }],
            "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500" }],
            "headline-lg": ["28px", { "lineHeight": "36px", "letterSpacing": "-0.015em", "fontWeight": "600" }],
            "headline-sm": ["18px", { "lineHeight": "24px", "letterSpacing": "0em", "fontWeight": "600" }],
            "headline-lg-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }]
          }
        }
      }
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      display: inline-block;
      vertical-align: middle;
      line-height: 1;
    }
    
    .clinical-grid {
      background-size: 32px 32px;
      background-image: 
        linear-gradient(to right, rgba(0, 59, 92, 0.04) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(0, 59, 92, 0.04) 1px, transparent 1px);
    }
    .clinical-grid-dark {
      background-size: 28px 28px;
      background-image: 
        linear-gradient(to right, rgba(141, 243, 243, 0.05) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(141, 243, 243, 0.05) 1px, transparent 1px);
    }
  </style>
</head>
<body class="bg-background text-on-surface antialiased min-h-screen flex flex-col justify-between selection:bg-primary selection:text-on-primary">
<!-- Main Dual-Pane Container -->
<main class="flex-1 w-full flex flex-col lg:flex-row min-h-[calc(100vh-68px)]">
<!-- LEFT PANE: Form & Clinical Access -->
<div class="w-full lg:w-[52%] xl:w-[50%] flex flex-col justify-between px-6 sm:px-10 md:px-14 lg:px-16 xl:px-20 py-8 lg:py-10 clinical-grid">
<!-- Top Brand Row -->
<div>
<div class="flex items-center justify-between gap-4 mb-8">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 w-full">
    <a href="#" class="inline-flex flex-col items-start gap-1 group focus:outline-none focus:ring-2 focus:ring-primary rounded-lg p-1.5 transition-all">
      <div class="h-16 md:h-20 w-auto max-w-[280px] overflow-hidden flex items-center">
        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-m02KuS_nUDvWbiLQvQTEgP5soAUhdapuZgVUF0ChZT9E-0Hz_iJznJom3MxsIJdVGW80QtMCovmNk1jRcQvDUydqwXPeh1CXh4OTEJXVRB1ZCQxCVc0mRjUbwhEIcksgm1Tf6rnrJXtMG_15PqzAUyXf9YGvNWG2F-bmspFvfw2huGx4uoTosCRFpHUlmiwRk9KDQen9osCOR67n_IDJodMttVcBh0sswETWj3GV_afoAsDGU_CONDYYPoV_DXS3Gg" alt="FisioalephPro Logo" class="h-full w-auto object-contain filter group-hover:brightness-105 transition-all">
      </div>
    </a>
    <div class="inline-flex items-center gap-3.5 px-4 py-2.5 rounded-2xl bg-surface-container-low border border-outline-variant/40 shadow-sm text-secondary self-start sm:self-center">
      <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmYUekdDs_wPMWP4Se53InNs7ECei041XyreY7F1EYYGa4IX1oh0tapZmrHjS1d_Rc1zSx2nXdCDeUXfJiiyBzPLkdSRAC3GBp5NAueqCaNLZrFh-nOipJN511MUS3DL7ZDFZ0hBd9kiUc6I9zOQtzZBemmFX52aZUme6wOQ3BmmLBdFAYzKW9gz4ooMYiRPazwzKUsqpjQNDOcqtwNBT15LAz4vjw21Ppl9xZK-V9WH3GofHXRJwuDqois0DnnLcVzA" alt="Fisioaleph Insignia" class="w-16 h-16 rounded-full object-cover shrink-0 ring-2 ring-primary/20 shadow-sm">
      <div class="flex flex-col text-left">
        <span class="font-label-sm text-label-sm text-secondary font-semibold tracking-normal">By Fisioaleph · Fisioterapia y Rehabilitacion</span>
        <span class="font-label-sm text-[11px] text-outline tracking-tight">Red Asistencial Especializada</span>
      </div>
    </div>
  </div>
</div>
<!-- Heading & Context -->
<div class="mb-7">
<div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-surface-container text-primary mb-3">
<span class="material-symbols-outlined text-primary text-[16px]" style="font-variation-settings: 'FILL' 1;">verified_user</span>
<span class="font-label-sm text-label-sm font-semibold tracking-wider uppercase">Portal Profesional de Fisioterapia</span>
</div>
<h1 class="font-headline-xl text-headline-xl lg:text-headline-xl font-bold text-on-background tracking-tight">
            Iniciar Sesión
          </h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-lg">
            Accede a tu plataforma clínica digital de kinesiología, registros biomecánicos y gestión de pacientes.
          </p>
</div>

<!-- Form Component -->
<form class="space-y-4 max-w-md" method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Input -->
<div class="space-y-1.5">
<label class="block font-label-lg text-label-lg text-on-surface font-semibold" for="email">
              Correo Electrónico
            </label>
<div class="relative rounded-lg shadow-sm">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-secondary">
<span class="material-symbols-outlined text-[20px]">badge</span>
</div>
<input class="block w-full pl-10 pr-3.5 py-2.5 bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg border {{ $errors->has('email') ? 'border-red-500 ring-red-500' : 'border-outline-variant/50' }} focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all placeholder:text-outline" id="email" name="email" placeholder="doctor@clinica.com" required autofocus type="email" value="{{ old('email') }}">
</div>
@if ($errors->has('email'))
  <p class="mt-1 text-sm text-red-600">{{ $errors->first('email') }}</p>
@endif
</div>
<!-- Password Input -->
<div class="space-y-1.5">
<div class="flex items-center justify-between">
<label class="block font-label-lg text-label-lg text-on-surface font-semibold" for="password">
                Contraseña
              </label>
@if (Route::has('password.request'))
<a class="font-label-sm text-label-sm text-primary hover:text-on-primary-fixed-variant font-medium transition-colors hover:underline" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
              </a>
@endif
</div>
<div class="relative rounded-lg shadow-sm">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-secondary">
<span class="material-symbols-outlined text-[20px]">lock</span>
</div>
<input class="block w-full pl-10 pr-10 py-2.5 bg-surface-container-lowest text-on-surface font-body-md text-body-md rounded-lg border {{ $errors->has('password') ? 'border-red-500 ring-red-500' : 'border-outline-variant/50' }} focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all placeholder:text-outline" id="password" name="password" placeholder="••••••••••••" required type="password">
<button aria-label="Mostrar u ocultar contraseña" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-outline hover:text-primary transition-colors focus:outline-none" id="togglePassword" type="button">
<span class="material-symbols-outlined text-[20px]" id="eyeIcon">visibility</span>
</button>
</div>
@if ($errors->has('password'))
  <p class="mt-1 text-sm text-red-600">{{ $errors->first('password') }}</p>
@endif
</div>
<!-- Remember Me & Support link -->
<div class="flex items-center justify-between pt-1">
<label class="flex items-center gap-2 cursor-pointer select-none">
<input {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 rounded text-primary border-outline-variant focus:ring-primary focus:ring-offset-0 transition-colors" name="remember" id="remember" type="checkbox">
<span class="font-body-sm text-body-sm text-on-surface-variant font-medium">Recordar en este equipo</span>
</label>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-secondary hover:text-primary transition-colors cursor-pointer">
<span class="material-symbols-outlined text-[15px]">help_center</span>
              Ayuda y Soporte
            </span>
</div>
<!-- Primary Submit CTA -->
<button class="w-full flex items-center justify-center gap-2 py-3 px-5 rounded-lg bg-primary hover:bg-[#0F4C5C] text-on-primary font-label-lg text-label-lg font-semibold tracking-wide shadow-md hover:shadow-lg shadow-primary/20 active:scale-[0.98] transition-all duration-150 cursor-pointer" type="submit">
<span class="">Iniciar Sesión en FisioalephPro</span>
<span class="material-symbols-outlined text-[20px]">login</span>
</button>

</form>
<!-- Access Registration & Medical Security Banner -->
<div class="mt-6 pt-5 border-t border-outline-variant/30 max-w-md space-y-3">
<div class="flex items-center justify-center gap-2 p-2 rounded-lg bg-surface-container-low border border-outline-variant/20 text-on-surface-variant font-label-sm text-label-sm text-center"><span class="material-symbols-outlined text-primary text-[16px]" style="font-variation-settings: 'FILL' 1;">lock</span><span class="leading-tight">Cifrado TLS 1.3 de grado médico · Conforme a LFPDPPP (México), HIPAA y RGPD</span></div>
</div>
</div>
<!-- Quick Help & Legal Reference -->
<div class="pt-6">
<p class="font-label-sm text-label-sm text-outline">
          FisioalephPro Software Clínico v4.2.8 · Certificación ISO 27001
        </p>
</div>
</div>
<!-- RIGHT PANE: SaaS Showcase -->
<div class="hidden lg:flex w-full lg:w-[48%] xl:w-[50%] bg-[#003B5C] relative overflow-hidden flex-col justify-between p-10 xl:p-14 text-white clinical-grid-dark shadow-2xl">
<!-- Ambient Radial Glowing Orbs -->
<div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#1A9393]/20 blur-3xl pointer-events-none"></div>
<div class="absolute bottom-10 left-[-20%] w-96 h-96 rounded-full bg-[#008282]/30 blur-3xl pointer-events-none"></div>
<div class="relative z-10"><div class="flex items-start gap-3.5"><div class="w-11 h-11 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-primary-fixed shrink-0"><span class="material-symbols-outlined text-[24px]">local_hospital</span></div><div><span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary-container font-semibold block mb-0.5">RED CLÍNICA &amp; ECOSISTEMA FISIOALEPH</span><h2 class="font-headline-sm text-headline-sm font-bold text-white tracking-tight leading-tight">Rehabilitación, Terapia Física y Biomecánica Basada en Evidencia</h2><p class="font-body-sm text-body-sm text-slate-300 mt-1.5 leading-snug">Integración clínica para optimización motriz, aceleración de cicatrización y prevención musculoesquelética.</p></div></div></div>
<div class="relative z-10 my-auto py-6 max-w-lg"><div class="rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 p-5 shadow-2xl space-y-4"><div class="flex items-center justify-between border-b border-white/15 pb-3.5"><div class="flex items-center gap-2.5"><div class="w-9 h-9 rounded-lg bg-primary/40 border border-primary-fixed/40 flex items-center justify-center font-headline-sm text-primary-fixed"><span class="material-symbols-outlined text-[20px]">apartment</span></div><div><p class="font-label-lg text-label-lg font-bold text-white leading-tight">Centros de Atención Especializada</p><p class="font-body-sm text-body-sm text-secondary-fixed">Red de Clínicas Fisioterapéuticas &amp; Rehabilitación</p></div></div><span class="px-2.5 py-1 rounded-full bg-[#C7EAE1]/20 border border-[#8df3f3]/30 text-[#8df3f3] font-label-sm text-label-sm font-semibold flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-primary-fixed animate-ping"></span>En Operación Continua</span></div><div class="grid grid-cols-2 gap-3"><div class="p-3 rounded-xl bg-white/5 border border-white/10 flex flex-col justify-between space-y-2"><div class="flex items-center justify-between"><span class="font-label-sm text-label-sm font-semibold text-white flex items-center gap-1"><span class="material-symbols-outlined text-[#8df3f3] text-[16px]">location_on</span>Sede Valle Imperial</span><span class="font-label-sm text-label-sm text-[#8df3f3]">Activa</span></div><p class="font-body-sm text-body-sm text-slate-300 leading-snug">Zapopan, Jalisco · Gimnasio Terapéutico y Consultorios Clínicos</p><div class="pt-1 border-t border-white/10 flex items-center justify-between font-label-sm text-label-sm text-slate-300"><span class="">Ortopedia &amp; Fisioterapia</span><span class="text-[#8df3f3] font-medium">Cons. 1</span></div></div><div class="p-3 rounded-xl bg-white/5 border border-white/10 flex flex-col justify-between space-y-2"><div class="flex items-center justify-between"><span class="font-label-sm text-label-sm font-semibold text-white flex items-center gap-1"><span class="material-symbols-outlined text-[#8df3f3] text-[16px]">location_on</span>Sede Sendas</span><span class="font-label-sm text-label-sm text-[#8df3f3]">Activa</span></div><p class="font-body-sm text-body-sm text-slate-300 leading-snug">Zapopan, Jalisco · Plaza Paseo Sendas, Equipamiento Avanzado</p><div class="pt-1 border-t border-white/10 flex items-center justify-between font-label-sm text-label-sm text-slate-300"><span class="">Medicina Física y Rehab</span><span class="text-[#8df3f3] font-medium">Áreas Indiv.</span></div></div></div><div class="p-3 rounded-xl bg-white/5 border border-white/10"><span class="font-label-sm text-label-sm text-secondary-container font-semibold uppercase tracking-wider block mb-1.5">Especialistas &amp; Cuerpo Médico</span><div class="space-y-1"><p class="font-body-sm text-body-sm text-slate-200 flex items-center gap-1.5"><span class="material-symbols-outlined text-[15px] text-[#8df3f3]">medical_services</span><strong class="text-white font-medium">Dra. Cintia Lorena Cárdenas Correa</strong> · Medicina de Rehabilitación</p><p class="font-body-sm text-body-sm text-slate-200 flex items-center gap-1.5"><span class="material-symbols-outlined text-[15px] text-[#8df3f3]">healing</span><strong class="text-white font-medium">Lic. María Rocío E. Mendoza Gómez</strong> · Fisioterapia y Terapia Física</p><p class="font-body-sm text-body-sm text-slate-200 flex items-center gap-1.5"><span class="material-symbols-outlined text-[15px] text-[#8df3f3]">orthopedics</span><strong class="text-white font-medium">Dr. Juan Manuel Flores Lira</strong> · Ortopedia y Traumatología</p></div></div><div class="flex flex-wrap gap-2 pt-0.5"><span class="px-2.5 py-1 rounded-md bg-white/10 text-white font-label-sm text-label-sm flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">menu_book</span>Biblioteca Digital Clínica</span><span class="px-2.5 py-1 rounded-md bg-white/10 text-white font-label-sm text-label-sm flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">calendar_today</span>Agenda y Citas</span><span class="px-2.5 py-1 rounded-md bg-white/10 text-white font-label-sm text-label-sm flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">psychology</span>FisioSinapsis AI</span></div></div><div class="mt-4 grid grid-cols-4 gap-2 bg-black/20 backdrop-blur-sm p-3 rounded-xl border border-white/10 text-center"><div class="p-1"><span class="block font-headline-sm text-headline-sm font-bold text-white">85</span><span class="block font-label-sm text-label-sm text-slate-300 leading-tight">Doctores &amp; Fisioterapeutas</span></div><div class="p-1"><span class="block font-headline-sm text-headline-sm font-bold text-primary-fixed">18</span><span class="block font-label-sm text-label-sm text-slate-300 leading-tight">Departamentos Clínicos</span></div><div class="p-1"><span class="block font-headline-sm text-headline-sm font-bold text-white">8</span><span class="block font-label-sm text-label-sm text-slate-300 leading-tight">Labs de Investigación</span></div><div class="p-1"><span class="block font-headline-sm text-headline-sm font-bold text-primary-fixed">150</span><span class="block font-label-sm text-label-sm text-slate-300 leading-tight">Premios &amp; Reconocimientos</span></div></div></div>
<div class="relative z-10 pt-4 border-t border-white/10 flex items-center justify-between text-secondary-fixed"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">verified</span><span class="font-label-sm text-label-sm">Red de Centros de Fisioterapia &amp; Ortopedia Fisioaleph</span></div><div class="flex items-center gap-3"><span class="font-label-sm text-label-sm font-semibold">99.9% Uptime Clínico</span><span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span></div></div>
</div>
</main>
<footer class="w-full py-5 px-6 lg:px-12 flex flex-col md:flex-row justify-between items-center gap-4 bg-surface-container-lowest border-t border-outline-variant/40 text-on-surface-variant">
<div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 text-center sm:text-left"><div class="flex items-center gap-2"><img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmYUekdDs_wPMWP4Se53InNs7ECei041XyreY7F1EYYGa4IX1oh0tapZmrHjS1d_Rc1zSx2nXdCDeUXfJiiyBzPLkdSRAC3GBp5NAueqCaNLZrFh-nOipJN511MUS3DL7ZDFZ0hBd9kiUc6I9zOQtzZBemmFX52aZUme6wOQ3BmmLBdFAYzKW9gz4ooMYiRPazwzKUsqpjQNDOcqtwNBT15LAz4vjw21Ppl9xZK-V9WH3GofHXRJwuDqois0DnnLcVzA" alt="Fisioaleph" class="w-5 h-5 rounded-full object-cover"><span class="font-label-lg text-label-lg font-bold text-on-surface">FisioalephPro</span></div><span class="hidden sm:inline text-outline-variant">|</span><p class="font-body-sm text-body-sm">© 2024 FisioalephPro by Fisioaleph. <span class="italic text-primary font-medium">"Conectando salud con conocimiento".</span> Cumplimiento con estándares HIPAA, GDPR y LFPDPPP.</p></div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const togglePasswordBtn = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      if (togglePasswordBtn && passwordInput && eyeIcon) {
        togglePasswordBtn.addEventListener('click', () => {
          const isPassword = passwordInput.getAttribute('type') === 'password';
          passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
          eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
        });
      }
    });
</script>
</body>
</html>
