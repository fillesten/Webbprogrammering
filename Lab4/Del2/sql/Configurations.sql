/* Det fösta steget är att koppla sig till DB-servern som en användare.
Om du inte har gjort ngr. ändringar eller skapat nya användare, 
skriver du raden redan i terminalen/Dos-prompten
*/

mysql -u root 

/*
 Observera att det finns många andra växlar/options. Läs manualen 
 för mysql om du behöver.
*/

/* Om du inte har skapat en databas redan, 
måste du skapa en för ändamålet! */

CREATE DATABASE PERSONAL;

/*Sedan skall du använda databasen du skapade ovan */

USE PERSONAL;

/* Om du redan har en database på servern 
behöver du bara använda: use database_name; */


SET SQL_SAFE_UPDATES=0;  /* För att "DELETE FROM table_name; " skall fungera. */
/* alternativt kan man använda : "TRUNCATE TABLE table_name;"
/* Ta bort allt om det redan finns , Dessa rader kommer att ge felmeddelanden
om tabellerna inte finns sedan tidigare */

