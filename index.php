<?php include 'includes/header.php'; ?>

<main class="min-h-screen bg-black text-white">

  <!-- Hero Section -->
  <section class="text-center py-20">
    <h1 class="text-4xl md:text-5xl font-bold text-orange-500">Hi, I'm Daniel Ngwasi</h1>
    <p class="mt-4 text-lg text-white">Full Stack Developer – Django · Laravel · PHP · MySQL</p>
    <a href="projects.php" class="mt-6 inline-block bg-orange-500 text-white px-6 py-3 rounded hover:bg-white hover:text-orange-500 transition">View My Projects</a>
  </section>

  <!-- About Preview -->
  <section class="container py-16 border-t border-white">
    <h2 class="text-2xl font-bold text-orange-500 mb-4">About Me</h2>
    <p class="text-white">
      I'm a passionate self-taught full stack developer from Kenya. I specialize in building clean, user-friendly websites and apps using Django and Laravel.
      My focus is on writing high-quality code, great user experiences, and turning ideas into fully functional products.
    </p>
    <a href="about.php" class="mt-4 inline-block text-orange-500 hover:underline">Read more &rarr;</a>
  </section>

  <!-- Skills / Services -->
  <section class="container py-16 border-t border-white">
    <h2 class="text-2xl font-bold text-orange-500 mb-4">What I Do</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="bg-white text-black p-4 rounded shadow text-center h-100">
          <h3 class="text-xl font-semibold mb-2">Web Development</h3>
          <p>I build full-stack web apps using PHP, Django, Laravel, and modern JavaScript frameworks.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-white text-black p-4 rounded shadow text-center h-100">
          <h3 class="text-xl font-semibold mb-2">UI/UX & Design</h3>
          <p>I create beautiful, accessible, and responsive front-ends using Bootstrap and Tailwind CSS.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="bg-white text-black p-4 rounded shadow text-center h-100">
          <h3 class="text-xl font-semibold mb-2">Open Source</h3>
          <p>I contribute to and maintain open-source projects. Knowledge sharing and collaboration excite me!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Projects (static preview for now) -->
  <section class="container py-16 border-t border-white">
    <h2 class="text-2xl font-bold text-orange-500 mb-4">Featured Projects</h2>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="bg-gray-800 p-4 rounded">
          <h4 class="text-white text-xl">Portfolio Website</h4>
          <p>A modern developer portfolio built with PHP and Tailwind CSS.</p>
          <a href="project-detail.php?id=1" class="text-orange-500 hover:underline">View Project</a>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="bg-gray-800 p-4 rounded">
          <h4 class="text-white text-xl">Blog System</h4>
          <p>A dynamic blogging platform with admin dashboard built in PHP and MySQL.</p>
          <a href="project-detail.php?id=2" class="text-orange-500 hover:underline">View Project</a>
        </div>
      </div>
    </div>
    <a href="projects.php" class="mt-4 inline-block text-orange-500 hover:underline">See all projects &rarr;</a>
  </section>

  <!-- Call to Action -->
  <section class="text-center py-20 border-t border-white">
    <h2 class="text-3xl font-bold text-white mb-4">Interested in working with me?</h2>
    <a href="contact.php" class="bg-orange-500 text-white px-6 py-3 rounded hover:bg-white hover:text-orange-500 transition">Get in Touch</a>
  </section>

</main>

<?php include 'includes/footer.php'; ?>
