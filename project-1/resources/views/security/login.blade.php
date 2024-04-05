<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Page de connexion</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center vh-100 w-100 ">
            <div class="w-50">
                <h3 class="text-center">Formulaire de connexion</h3>
                @if (session('error'))
                    <div class="alert alert-danger"> {{session('error')}} </div>
                @endif
                <form action="{{ route('login.post')}}" method="POST">
                    @csrf
                    
                    <div class="nb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="nb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                        
                    </div>
                    {{-- <div class="nb-3">
                        <input type="checkbox" name="status" {{ empty($task) ? "" : "checked"}} class="form-check-input" id="form-check-label">
                        <label for="title" class="form-label">Termine</label>
                    </div> --}}
                
                    <button type="submit" class="btn btn-info">Se connecter</button>
                </form>
            </div>

            
        </div>
        
    </body>
</html>

