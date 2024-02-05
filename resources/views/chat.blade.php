<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
{{--        <link rel="stylesheet" href="/css/app.css">--}}
        <link rel="stylesheet" href="/css/chat.css">

        <title>Simple Chat Aplication</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    @vite(['resources/js/app.js'])
    </head>
<body>


<section class="msger">
  <header class="msger-header">

    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i>
      <span class="chatWith"></span>
      <span class="typing" style="display: none;">Typing...</span>
    </div>

    <div class="msger-header-options">
      <span class="chatStatus offline"><i class="fas fa-globe"></i></span>
    </div>
  </header>

  <div class="msger-chat">

  </div>

  <form class="msger-inputarea">
    <input type="text" class="msger-input" oninput="sendTypingEvet()" placeholder="Enter message...">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>

</section>

{{--<script src="https://example.com/fontawesome/v5.15.4/js/all.js" data-auto-a11y="true" ></script>--}}
{{--<script src="../js/app.js"></script>--}}
<script type="module" src="../js/chat.js"></script>

</body>
</html>
