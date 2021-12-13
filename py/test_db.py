import mysql.connector
#Aufbau einer Verbindung
db = mysql.connector.connect(
  host="localhost", # Servername
  user="root", # Benutzername
  password="root", # Passwort
  database="turtle"
)
# Ausgabe des Hashwertes des initialisierten Objektes
print(db)

sqlStmt = "SHOW TABLES;"
cursor = db.cursor()
cursor.execute(sqlStmt)
for table in cursor:
  print(table)
