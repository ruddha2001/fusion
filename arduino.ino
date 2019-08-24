#include <LiquidCrystal.h>
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);
void setup() 
{
  Serial.begin(9600);
  lcd.begin(16,2);
  lcd.clear();
  pinMode(13,OUTPUT);
  pinMode(10,OUTPUT);
  digitalWrite(10,HIGH);
}

void loop() 
{
  int inputA=map(analogRead(A0),0,1023,0,100);
  int inputB=map(analogRead(A2),0,1023,0,100);
  int inputC=map(analogRead(A3),0,1023,0,100);
  int inputD=map(analogRead(A4),0,1023,0,100);
  int inputE=map(analogRead(A5),0,1023,0,100);
  String outputA = String(inputA);
  String outputB = String(inputB);
  String outputC = String(inputC);
  String outputD = String(inputD);
  String outputE = String(inputE);
  String totalOutput="A"+outputA+"B"+outputB+"C"+outputC+"D"+outputD+"E"+outputE;
  Serial.println(totalOutput);
  if(inputA>=50||inputB>=50||inputC>=50||inputD>=50)
  {
    digitalWrite(10,LOW);
    digitalWrite(13,HIGH);
    lcd.clear();
    lcd.setCursor(1, 0);
    lcd.print("Garbage Bins:");
    lcd.setCursor(1, 1);
    lcd.print("Full!");
  }
  else if(inputE>80)
  {
    digitalWrite(10,LOW);
    digitalWrite(13,HIGH);
    lcd.clear();
    lcd.setCursor(1, 0);
    lcd.print("Garbage Bins:");
    lcd.setCursor(1, 1);
    lcd.print("Stinking!");
  }
  else
  {
    lcd.setCursor(1, 0);
    digitalWrite(13,LOW);
    digitalWrite(10,HIGH);
    lcd.clear();
    lcd.print("ALL OK!");
  }
  delay(1000);
}
