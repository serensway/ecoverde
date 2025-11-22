<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Empleado</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #632b2bff 50%, #24243e 100%);
            min-height: 100vh;
            overflow: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .glass-card {
            background: rgba(41, 12, 12, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            width: 90%;
            max-width: 400px;
            padding: 2.5rem;
            margin: 2rem;
            position: relative;
            z-index: 10;
        }
        
        .sphere {
            position: absolute;
            border-radius: 50%;
            filter: blur(0px);
            animation: float 15s infinite ease-in-out;
            opacity: 0.8;
        }
        
        .sphere-1 {
            width: 250px;
            height: 250px;
            top: 10%;
            left: 25%;
            background: radial-gradient(circle at 30% 30%, #ffae00ff 0%, #fbff00ff 100%);
            animation-delay: 0s;
        }
        
        .sphere-2 {
            width: 180px;
            height: 180px;
            bottom: 15%;
            right: 15%;
            background: radial-gradient(circle at 30% 30%, #ffae00ff 0%, #ff0000ff 100%);
            animation-delay: 3s;
        }
        
        .sphere-3 {
            width: 120px;
            height: 120px;
            top: 90%;
            left: 20%;
            background: radial-gradient(circle at 30% 30%, #ffcc00 0%, #ff6600 100%);
            animation-delay: 6s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 15px 20px;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.15);
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .btn-login {
            background: linear-gradient(45deg, #ff6600ff, #8d0404ff);
            color: white;
            border-radius: 50px;
            padding: 15px 0;
            transition: all 0.3s ease;
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(246, 255, 0, 0.41);
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .title {
            background: linear-gradient(90deg, #8d0404ff, #ff6600ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .checkbox-container input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            position: relative;
            margin-right: 8px;
        }
        
        .checkbox-container input[type="checkbox"]:checked {
            background: linear-gradient(45deg, #9d00ff, #ff00ff);
            border-color: transparent;
        }
        
        .checkbox-container input[type="checkbox"]:checked::after {
            content: "✓";
            position: absolute;
            color: white;
            font-size: 12px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <!-- Background spheres -->
    <div class="sphere sphere-1"></div>
    <div class="sphere sphere-2"></div>
    <div class="sphere sphere-3"></div>
    
    <!-- Main login card -->
    <div class="glass-card">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold title mb-2">Inmobiliaria
            </h1>
            <p class="text-white opacity-80">Inicia Sesión</p>
        </div>
        
        <form id="form-login" action="procesar.php" method="post" class="space-y-6">
            <div class="space-y-4">
                <div>
                    <div class="flex items-center mb-1">
                        <i class="fas fa-envelope text-white mr-2 opacity-80"></i>
                        <label for="usuario" class="text-white text-sm opacity-80">Usuario</label>
                    </div>
                    <input type="usuario" name="usu" class="input-field" placeholder="Ingresa tu Usuario">
                </div>
                
                <div>
                    <div class="flex items-center mb-1">
                        <i class="fas fa-lock text-white mr-2 opacity-80"></i>
                        <label for="clave" class="text-white text-sm opacity-80">Clave</label>
                    </div>
                    <input type="password" name="cla" class="input-field" placeholder="Ingresa tu Clave">
                </div>
            </div>
            
            <div class="flex items-center justify-between">
            <button type="submit" class="w-full btn-login font-medium">LOGIN</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.input-field');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('i').style.transform = 'scale(1.2)';
                    this.parentElement.querySelector('i').style.opacity = '1';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('i').style.transform = 'scale(1)';
                    this.parentElement.querySelector('i').style.opacity = '0.8';
                });
            });
            
            // Add subtle floating animation to the login card
            const card = document.querySelector('.glass-card');
            let floatValue = 0;
            let floatDirection = 1;
            
            function floatCard() {
                floatValue += 0.02 * floatDirection;
                
                if (floatValue > 3) floatDirection = -1;
                if (floatValue < -3) floatDirection = 1;
                
                card.style.transform = `translateY(${floatValue}px)`;
                requestAnimationFrame(floatCard);
            }
            
            floatCard();
            
            // Add sphere interaction
            const spheres = document.querySelectorAll('.sphere');
            
            spheres.forEach(sphere => {
                sphere.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                    this.style.opacity = '1';
                });
                
                sphere.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.opacity = '0.8';
                });
            });
        });
    </script>
</body>
</html>