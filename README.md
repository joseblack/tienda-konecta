# tienda-konecta
Prueba de desarrollo php
Elaborada bajo el frameword Laravel 

Pasos para instalación 

En la raiz del proyecto esta la base de datos llamda konecta 

tener mysql, composer instalado y node js 

1 Clonar el proyecto desde la siguiente url 
  https://github.com/joseblack/tienda-konecta.git
2 copiar en el archivo .env la conexión a la base de datos llamada konecta
3 Ir a la raiza del proyecto y ejecutar el comando: npm install 
4 En la raiza del proyecto ejecutar: npm run dev 
5 ejecutar servidor:  php artisan serve 
  el arrojara una ruta similar a http://localhost:8000/

Usuario de sistema: admin@example.com Password: konecta2021 o un su defecto ir a eje: http://localhost:8000/register
y registrarse para poder acceder al sistema.

Consultas a a la base de datos 
# Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
select nombre, max(stock) 
from products 
group by nombre desc;

# Realizar una consulta que permita conocer cuál es el producto más vendido.
select nombre, sum(cantidad) 
from ventas_realizadas v
inner join products p on v.producto_id = p.id 
group by producto_id, nombre  desc;
  
  
