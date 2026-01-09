# Introducción

## Temática del Proyecto

Florería Foliissimo: cada hoja cuenta una historia
## Descripción del proyecto:

Foliissimo es una florería que cuenta con una tienda virtual con principal objetivo, la venta de flores, plantas de interior y exterior, decoración e insumos para el cuidado de las mismas, donde el cliente puede realizar pedidos sobre uno o varios productos para el hogar.

Cada producto puede ser clasificado según tamaño, precio, categoría, y otras características a continuación.

Cuando un cliente selecciona y realiza una compra de uno o más productos, se genera un pedido detallando cada uno de los productos seleccionados, más otros atributos que se mencionan a continuación

# Requisitos

- Diagrama Entidad-Relación

![ERD Compacto](https://github.com/iaw-2023/Data-Demons-laravel/assets/42704038/6d7b0171-89eb-4d75-8012-53dd9252cbb0)

![ERD Expandido](https://github.com/iaw-2023/Data-Demons-laravel/assets/42704038/bfc3879a-d583-45c5-8b40-146af7956f0d)

## Proyecto Framework PHP - Laravel
- Entidades que se podrán actualizar
    * `Producto`
    * `Categoría`
    * `Tamaño`
    * `Estado Pedido`
- Reportes que se podrán generar/visualizar
    * Pedidos realizados según X atributo/filtro
    * Clientes según X atributo/filtro
    * Productos según X atributo/filtro
- Entidades que se podrán obtener por API
    * `Producto`
    * `Pedido`
    * `Cliente`
    * `Categoría`
    * `Tamaño`
    * `Detalle de pedido`
- Entidades que se podrán modificar por API
    * `Cliente`
    * `Pedido`

## Javascript - React/Vue
- Información que podrá ver el usuario
    * Logo y nombre de la tienda
    * Pestaña para ver pedidos realizados
    * Carrusel de novedades sobre la tienda (Las categorías más visitadas,productos destacados)
    * Una barra con todas las categorías
    * Un recurso que podrá ser accedido para ver todos los productos de la tienda con algún orden predeterminado
    * Un espacio para la búsqueda de productos
    * Apartado de Contacto de la tienda
- Acciones que el usuario podrá realizar, ya sea la primera vez que ingrese a la aplicación como futuros accesos a la misma
    * Ingresar a cada producto para verlo con más detalle
    * Navegar por las categorías
    * Buscar producto/s
    * Ver todos los productos
    * Ver productos en el carrito
    * Filtrar productos por alguna condición (Ej: mas vendidos, ultimos agregados, etc)
    * Ver pedidos realizados

## Etapa 2: Proyecto Framework PHP - Laravel

#### [Link](https://foliissimo-brunovelazquez.vercel.app/) al Deploy de Vercel

#### [Link](https://foliissimo-brunovelazquez.vercel.app/rest/documentation) a la documentación en SwaggerUI

### Librerías importadas

#### [Bootstrap](https://getbootstrap.com/)
#### [DataTables](https://datatables.net/)
#### [JQuery](https://jquery.com/)

### Testeado en Safari, Brave, Mozilla Firefox, Google Chrome y Microsoft Edge

### Ejemplos para probar la API
##### Nota: Para acceder a la API se utiliza /rest
#### GET /categorias
##### Obtiene la lista de todas las categorías
#### GET /pedidos/{id}/index
##### Obtiene todos los detalles de pedido con el ID indicado
##### Ejemplo:
/rest/pedidos/1/index devuelve la lista de detalles del pedido con ID 1, con el código 200
/rest/pedidos/89/index o de cualquier ID de pedido que no exista, devuelve la lista vacía.
#### GET /pedidos/{id_cliente}/index_id
##### Obtiene la lista de pedidos asociados a un cliente en base a su ID
##### Ejemplo
/rest/pedidos/1/index_id devuelve los pedidos del cliente con ID 1
#### GET /productos
##### Obtiene la lista de todos los productos.
#### GET /productos/{id}/show
##### Obtiene la información de un producto en base a su ID
##### Ejemplo:
/rest/productos/1/show devuelve el producto con ID 1
#### GET /tamaños
##### Obtiene la lista de todos los tamaños
