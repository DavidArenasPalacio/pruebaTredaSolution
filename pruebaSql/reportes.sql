/* REPORTE 1 */

SELECT cliente.cedula,  CONCAT(cliente.primer_nombre, ' ', cliente.primer_apellido) as nombre, cliente.dias_mora as diasEnMora,
CASE 
    WHEN cliente.dias_mora BETWEEN 1 AND 20 THEN 'Riesgo Bajo' 
    WHEN cliente.dias_mora BETWEEN 21 AND 35 THEN 'Riego Medio'
    ELSE  
      'Riesgo Alto'
END AS Riesgo, 
 ciudad.nombre as ciudad FROM cliente INNER JOIN ciudad  ON cliente.id_ciudad = ciudad.id ORDER BY cliente.dias_mora ASC

 /* REPORTE 2 */
SELECT p.CC , p.Nombre, p.Apellido, e.Institucion, MAX(e.fecha) as fecha FROM Estudios e INNER JOIN Persona p ON e.Persona = p.CC GROUP BY p.CC;