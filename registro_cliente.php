<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
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
            padding: 2rem 0;
        }
        
        .glass-card {
            background: rgba(41, 12, 12, 0.5);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            width: 90%;
            max-width: 450px;
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
            padding: 12px 20px;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 14px;
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
        
        .btn-registro {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            border-radius: 50px;
            padding: 15px 0;
            transition: all 0.3s ease;
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .btn-registro:hover {
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

        .message {
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
            display: none;
            font-size: 14px;
        }

        .message.show {
            display: block;
        }

        .error-message {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #ff6b6b;
        }

        .success-message {
            background: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #51cf66;
        }

        label {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <!-- Background spheres -->
    <div class="sphere sphere-1"></div>
    <div class="sphere sphere-2"></div>
    <div class="sphere sphere-3"></div>
    
    <!-- Main registration card -->
    <div class="glass-card">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold title mb-2">Registro de Cliente</h1>
            <p class="text-white opacity-80 text-sm">Crea tu cuenta para acceder</p>
        </div>

        <div id="errorMessage" class="message error-message"></div>
        <div id="successMessage" class="message success-message"></div>
        
        <form id="form-registro" method="post" class="space-y-4">
            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-id-card text-white mr-2 opacity-80 text-sm"></i>
                    <label for="cedula" class="text-white opacity-80">Cédula</label>
                </div>
                <input type="number" name="cedula" id="cedula" class="input-field" placeholder="Ej: 4567890" required>
            </div>

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-user text-white mr-2 opacity-80 text-sm"></i>
                    <label for="nombres" class="text-white opacity-80">Nombres</label>
                </div>
                <input type="text" name="nombres" id="nombres" class="input-field" placeholder="Ej: Juan Carlos" required>
            </div>

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-user text-white mr-2 opacity-80 text-sm"></i>
                    <label for="apellidos" class="text-white opacity-80">Apellidos</label>
                </div>
                <input type="text" name="apellidos" id="apellidos" class="input-field" placeholder="Ej: López García" required>
            </div>

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-user-circle text-white mr-2 opacity-80 text-sm"></i>
                    <label for="usuario" class="text-white opacity-80">Usuario</label>
                </div>
                <input type="text" name="usuario" id="usuario" class="input-field" placeholder="Ej: jlopez123" required minlength="4">
                <p class="text-white opacity-60 text-xs mt-1 ml-4">Mínimo 4 caracteres</p>
            </div>
            
            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-lock text-white mr-2 opacity-80 text-sm"></i>
                    <label for="clave" class="text-white opacity-80">Contraseña</label>
                </div>
                <input type="password" name="clave" id="clave" class="input-field" placeholder="Mínimo 6 caracteres" required minlength="6">
            </div>

            <div>
                <div class="flex items-center mb-1">
                    <i class="fas fa-lock text-white mr-2 opacity-80 text-sm"></i>
                    <label for="clave2" class="text-white opacity-80">Confirmar Contraseña</label>
                </div>
                <input type="password" name="clave2" id="clave2" class="input-field" placeholder="Repite tu contraseña" required minlength="6">
            </div>
            
            <button type="submit" name="registrar" class="w-full btn-registro font-medium mt-6">CREAR CUENTA</button>

            <div class="text-center mt-4">
                <a href="login_cliente.php" class="text-white opacity-70 hover:opacity-100 transition text-sm">
                    ¿Ya tienes cuenta? Inicia sesión
                </a>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {
        include("conexion.php");
        
        $cedula = $_POST['cedula'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        // Validación: contraseñas coinciden
        if ($clave !== $clave2) {
            echo "<script>
                document.getElementById('errorMessage').textContent = 'Las contraseñas no coinciden';
                document.getElementById('errorMessage').classList.add('show');
            </script>";
            exit();
        }
        
        // Validación: verificar si el usuario ya existe
        $checkUsuario = "SELECT * FROM cliente WHERE cli_usuario = :USUARIO";
        $stmt = $PDO->prepare($checkUsuario);
        $stmt->bindParam(':USUARIO', $usuario);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<script>
                document.getElementById('errorMessage').textContent = 'El usuario ya existe. Elige otro nombre de usuario.';
                document.getElementById('errorMessage').classList.add('show');
            </script>";
            exit();
        }
        
        // Validación: verificar si la cédula ya existe
        $checkCedula = "SELECT * FROM cliente WHERE cli_cedula = :CEDULA";
        $stmt2 = $PDO->prepare($checkCedula);
        $stmt2->bindParam(':CEDULA', $cedula);
        $stmt2->execute();
        
        if ($stmt2->rowCount() > 0) {
            echo "<script>
                document.getElementById('errorMessage').textContent = 'La cédula ya está registrada.';
                document.getElementById('errorMessage').classList.add('show');
            </script>";
            exit();
        }
        
        // Insertar nuevo cliente
        $sql = "INSERT INTO cliente (cli_cedula, cli_nombres, cli_apellidos, cli_usuario, cli_clave) 
                VALUES (:CEDULA, :NOMBRES, :APELLIDOS, :USUARIO, :CLAVE)";
        
        $stmt3 = $PDO->prepare($sql);
        $stmt3->bindParam(':CEDULA', $cedula);
        $stmt3->bindParam(':NOMBRES', $nombres);
        $stmt3->bindParam(':APELLIDOS', $apellidos);
        $stmt3->bindParam(':USUARIO', $usuario);
        $stmt3->bindParam(':CLAVE', $clave);
        
        if ($stmt3->execute()) {
            echo "<script>
                document.getElementById('successMessage').textContent = '¡Cuenta creada exitosamente! Redirigiendo al login...';
                document.getElementById('successMessage').classList.add('show');
                setTimeout(function() {
                    window.location.href = 'login_cliente.php';
                }, 2000);
            </script>";
        } else {
            echo "<script>
                document.getElementById('errorMessage').textContent = 'Error al crear la cuenta. Intenta nuevamente.';
                document.getElementById('errorMessage').classList.add('show');
            </script>";
        }
    }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-registro');
            const clave = document.getElementById('clave');
            const clave2 = document.getElementById('clave2');
            
            // Validación en tiempo real de contraseñas
            clave2.addEventListener('input', function() {
                if (clave.value !== clave2.value) {
                    clave2.style.borderColor = 'rgba(255, 0, 0, 0.5)';
                } else {
                    clave2.style.borderColor = 'rgba(0, 255, 0, 0.5)';
                }
            });
            
            // Animaciones de input
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
            
            // Animación flotante de la card
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