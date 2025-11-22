<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
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
            background: radial-gradient(circle at 30% 30%, #4facfe 0%, #00f2fe 100%);
            animation-delay: 0s;
        }
        
        .sphere-2 {
            width: 180px;
            height: 180px;
            bottom: 15%;
            right: 15%;
            background: radial-gradient(circle at 30% 30%, #43e97b 0%, #38f9d7 100%);
            animation-delay: 3s;
        }
        
        .sphere-3 {
            width: 120px;
            height: 120px;
            top: 90%;
            left: 20%;
            background: radial-gradient(circle at 30% 30%, #fa709a 0%, #fee140 100%);
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
            background: linear-gradient(45deg, #4facfe, #00f2fe);
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
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
        }
        
        .title {
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .error-message {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 10px;
            padding: 10px;
            color: #ff6b6b;
            margin-bottom: 15px;
            display: none;
        }

        .error-message.show {
            display: block;
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
            <h1 class="text-4xl font-bold title mb-2">Portal Cliente</h1>
            <p class="text-white opacity-80">Accede a tu cuenta</p>
        </div>

        <div id="errorMessage" class="error-message"></div>
        
        <form id="form-login" method="post" class="space-y-6">
            <div class="space-y-4">
                <div>
                    <div class="flex items-center mb-1">
                        <i class="fas fa-user text-white mr-2 opacity-80"></i>
                        <label for="usuario" class="text-white text-sm opacity-80">Usuario</label>
                    </div>
                    <input type="text" name="usuario" class="input-field" placeholder="Ingresa tu Usuario" required>
                </div>
                
                <div>
                    <div class="flex items-center mb-1">
                        <i class="fas fa-lock text-white mr-2 opacity-80"></i>
                        <label for="clave" class="text-white text-sm opacity-80">Contraseña</label>
                    </div>
                    <input type="password" name="clave" class="input-field" placeholder="Ingresa tu Contraseña" required>
                </div>
            </div>
            
            <button type="submit" class="w-full btn-login font-medium">INGRESAR</button>

            <div class="text-center mt-4 space-y-2">
    <div>
        <a href="registro_cliente.php" class="text-white opacity-90 hover:opacity-100 transition text-sm font-semibold">
            ¿No tienes cuenta? Regístrate aquí
        </a>
    </div>
    <div>
        <a href="seleccion_login.html" class="text-white opacity-70 hover:opacity-100 transition text-sm">
            ← Volver a selección
        </a>
    </div>
</div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include("conexion.php");
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        
        $sql = "SELECT * FROM cliente WHERE cli_usuario = :USUARIO AND cli_clave = :CLAVE";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':USUARIO', $usuario);
        $stmt->bindParam(':CLAVE', $clave);
        
        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            if ($resultado) {
                // Login exitoso
                session_start();
                $_SESSION['cliente_codigo'] = $resultado->cli_codigo;
                $_SESSION['cliente_nombre'] = $resultado->cli_nombres;
                $_SESSION['cliente_apellido'] = $resultado->cli_apellidos;
                $_SESSION['tipo_usuario'] = 'cliente';
                
                // Redirigir al panel de cliente
                header("Location: panel_cliente.php");
                exit();
            } else {
                echo "<script>
                    document.getElementById('errorMessage').textContent = 'Usuario o contraseña incorrectos';
                    document.getElementById('errorMessage').classList.add('show');
                </script>";
            }
        } else {
            echo "<script>
                document.getElementById('errorMessage').textContent = 'Error en el sistema. Intente nuevamente.';
                document.getElementById('errorMessage').classList.add('show');
            </script>";
        }
    }
    ?>

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
        });
    </script>
</body>
</html>