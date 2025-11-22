#include <WiFi.h>
#include <HTTPClient.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

// CONFIGURAR
const char* ssid     = "Gamarra Ojeda"; //Nombre del wifi
const char* password = "08192224"; //Contraseña del wifi
// Ajustá la IP/host al servidor donde colocaste ventas.php
const char* serverUrl = "https://promo025.com/angeles/api/ventas.php?tipo=venta";

#define SCREEN_WIDTH 128
#define SCREEN_HEIGHT 64
#define OLED_RESET    -1
Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, OLED_RESET);

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
  display.clearDisplay();
  display.setTextSize(1);
  display.setTextColor(SSD1306_WHITE);
  display.setCursor(0,0);
  display.println("Conectando WiFi...");
  display.display();

  int tries = 0;
  while (WiFi.status() != WL_CONNECTED && tries < 40) {
    delay(250);
    tries++;
  }
  display.clearDisplay();
  if (WiFi.status() == WL_CONNECTED) {
    display.println("WiFi conectado");
    display.println(WiFi.localIP().toString());
  } else {
    display.println("WiFi fallo");
  }
  display.display();
  delay(1000);
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverUrl);
    int httpCode = http.GET();
    if (httpCode == 200) {
      String payload = http.getString();
      payload.trim();
      int count = payload.toInt();

      display.clearDisplay();
      display.setTextSize(1);
      display.setCursor(0,0);
      display.println("Cantidad de arboles plantados");
      display.setTextSize(2);
      display.setCursor(0,20);
      display.print(count);
      display.display();

      Serial.println("Cantidad: " + String(count));
    } else {
      Serial.print("HTTP error: ");
      Serial.println(httpCode);
    }
    http.end();
  } else {
    Serial.println("No WiFi");
  }

  delay(30000); // actualizar cada 30s
}