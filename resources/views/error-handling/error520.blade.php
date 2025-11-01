<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 520</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    <div class="min-h-screen flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-6xl font-bold text-dark dark:text-light mb-4">520</h1>
        <h2 class="text-2xl font-semibold text-dark dark:text-light mb-6">Unknown Error</h2>
        <p class="text-lg text-dark/70 dark:text-light/70 mb-8">
            Oops! Something went wrong on our end. Please contact the <strong>technical support team</strong> immediately.<br>
            You can also click the button below to continue working.
        </p>
        <a href="{{ url()->previous() }}" class="btn bg-[#E78E00] hover:bg-[#FFA13C] text-white border-none shadow-md shadow-gray-400/40 px-6 py-3">
            Go Back
        </a>
    </div>
    
</body>
</html>