<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycling Services</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 text-white">
    <header class="p-6 text-center">
        <h1 class="text-4xl font-bold animate__animated animate__fadeIn">Recycling Services</h1>
    </header>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold mb-4 fade-in" id="services-header">Our Recycling Services</h2>
        <p class="mb-4 fade-in" id="services-description">We offer a variety of recycling services to help you manage your waste responsibly. Our services include:</p>
        <ul class="list-disc list-inside mb-4 fade-in" id="services-list">
            <li>Residential Recycling</li>
            <li>Commercial Recycling</li>
            <li>Electronic Waste Recycling</li>
            <li>Construction and Demolition Recycling</li>
        </ul>
        <p class="fade-in" id="request-text">If you would like to request our services, please fill out the form below:</p>

        <form id="serviceRequestForm" action="recycling.php" method="POST" class="mt-4 bg-white p-6 rounded shadow-md transition-transform transform hover:scale-105">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Your Name</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Your Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div class="mb-4">
                <label for="service" class="block text-gray-700">Select Service</label>
                <select id="service" name="service" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">--Select a Service--</option>
                    <option value="Residential Recycling">Residential Recycling</option>
                    <option value="Commercial Recycling">Commercial Recycling</option>
                    <option value="Electronic Waste Recycling">Electronic Waste Recycling</option>
                    <option value="Construction and Demolition Recycling">Construction and Demolition Recycling</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">Request Service</button>
        </form>
    </div>

    <footer class="bg-gray-800 text-white py-4 mt-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 EcoWaste Solutions. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Optional: Add form validation feedback
        const form = document.getElementById('serviceRequestForm');
        form.addEventListener('submit', function(event) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const service = document.getElementById('service').value;

            if (!name || !email || !service) {
                event.preventDefault();
                alert('Please fill out all required fields.');
            }
        });

        // Fade-in animation for elements
        const fadeInElements = document.querySelectorAll('.fade-in');
        fadeInElements.forEach((element) => {
            element.classList.add('visible');
        });
    </script>
</body>
</html>