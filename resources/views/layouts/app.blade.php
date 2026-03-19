<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Covoit Application')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
 
        /* Header */
        .header { background-color: #5bc0de; color: white; padding: 15px 20px; text-align: center; }
        .header h1 { font-size: 1.4em; margin-bottom: 5px; }
        .header nav a { color: white; text-decoration: none; margin: 0 10px; font-size: 0.95em; }
        .header nav a:hover { text-decoration: underline; }
 
        /* Footer */
        .footer { background-color: #5bc0de; color: white; text-align: center; padding: 12px; margin-top: 30px; font-size: 0.9em; }
 
        /* Container */
        .container { max-width: 900px; margin: 20px auto; padding: 20px; background: white; border-radius: 5px; border: 1px solid #ddd; }
 
        /* Table */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #f0f0f0; font-weight: bold; }
 
        /* Buttons */
        .btn { display: inline-block; padding: 6px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 0.9em; color: white; }
        .btn-info { background-color: #5bc0de; }
        .btn-info:hover { background-color: #46b8da; }
        .btn-primary { background-color: #337ab7; }
        .btn-primary:hover { background-color: #286090; }
 
        /* Info table (profil) */
        .info-table { width: auto; margin-top: 10px; border: 1px solid #5bc0de; }
        .info-table th { background-color: #d9edf7; color: #333; border: 1px solid #5bc0de; }
        .info-table td { border: 1px solid #5bc0de; }
 
        /* Form */
        .form-inline { display: inline-flex; align-items: center; gap: 8px; }
        .form-inline input[type="text"] { padding: 5px 10px; border: 1px solid #ccc; border-radius: 3px; }
 
        h2 { margin-bottom: 15px; }
        h3 { margin-top: 15px; margin-bottom: 8px; }
        .section { margin-top: 20px; }
    </style>
</head>
<body>
    @include('partials.header')
 
    <div class="container">
        @yield('content')
    </div>
 
    @include('partials.footer')
</body>
</html>