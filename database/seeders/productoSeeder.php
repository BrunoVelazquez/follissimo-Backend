<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeders\faker;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        $tipos_tamaño = DB::table('tamaños')->pluck('id');
        DB::table('productos')->insert([
            'nombre' => 'Geranio',
            'precio' => '900',
            'descripción' =>'Los geranios son plantas de exterior con flores de colores vivos. Florecen durante el verano y son bastante resistentes.',
            'color' => 'rosa',
            'imagen'=>Str::random(),
            'id_imagen'=>'product_images/f1sjwnvbmgezpjekw2yn',
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);
    }
        /*
        $plantas_interior = array("Ficus elastica","Sansevieria","Filodendro","Cuna de Moisés", "Monstera",
                                "Monstera Adansonii", "Singoriun", "Lazo de amor", "Calatea", "Pothus");
        $plantas_exterior = array("Geranios","Hortensias","Lavandas","Petunias","Rosales", "Hiedra", "Helecho",
                                "Crisantemo");
        $flores_exoticas = array("Orquídea","Amapola de California","Jazmín nocturno","Iris japonés","Plumeria");
        $flores_habituales = array("Rosa","Lirio","Margarita","Clavel","Girasol","Gerbera");
        $colores = array("rojo", "azul", "verde", "amarillo", "negro","blanco");
        $insumos_floreria = array("Cajas de cartón para arreglos","Papel celofán","Cintas decorativas","Espuma floral","Tijeras de poda",
                                "Maceta ceramica", "Palo tutor", "Portamaceta", "Bolsa perlita", "Sustrato plantas interior", "Florero",
                                "Palo santo", "Hidro");

        

      

        DB::table('productos')->insert([
            'nombre' =>'Geranio',
            'precio' => '2500',
            'descripción' => 'Los geranios son plantas de exterior con flores de colores vivos. Florecen durante el verano y son bastante resistentes.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Hortensias',
            'precio' => '2300',
            'descripción' => 'De origen asiático, las hortensias crecen en forma de enredadera y tienen unas hojas y flores bastante grandes. Además, las flores son muy coloridas y tienen un agradable aroma. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lavanda',
            'precio' => '2400',
            'descripción' => 'Arbusto de aroma característico, de 50 - 80 cm de altura. Tallos leñosos, muy ramificados, de los que nacen ramas herbáceas profusamente cubiertas de hojas opuestas, angostas y alargadas, de 2 - 5 cm de longitud. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Petunias',
            'precio' => '3900',
            'descripción' => 'La Petunia es una planta perenne tratada bajo cultivo como anual que llega a medir hasta los 160 cm. Las hojas son alternas u opuestas, de 7 cm de largo por 3.5 de ancho. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Rosales',
            'precio' => '1500',
            'descripción' => 'Los rosales son arbustos o trepadoras, generalmente espinosos, que alcanzan de dos a cinco metros de altura. Tienen tallos semileñosos.Algunos de textura rugosa y escamosa. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

         /////////////////////////////////////////////////

        DB::table('productos')->insert([
            'nombre' => 'Gomero',
            'precio' => '1700',
            'descripción' => 'El gomero es un árbol oriundo de la india, perteneciente a la familia Moraceae. Se cultiva ampliamente en las regiones tropicales y subtropicales de casi todo el continente americano',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '2',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

       
        DB::table('productos')->insert([
            'nombre' => 'Sansevieria',
            'precio' => '2100',
            'descripción' => 'La lengua de suegra o sansevieria, como también es conocida, puede purificar el aire dentro de tu hogar ya que sus hojas absorben las toxinas,',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Filodendro',
            'precio' => '980',
            'descripción' => 'Las hojas son generalmente grandes, a menudo lobuladas o hendidas profundamente, y pueden ser más o menos pinnadas.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Cuna de moises',
            'precio' =>'3100',
            'descripción' => 'La cuna de Moisés es una planta con hojas grandes de 12 a 65 cm de largo, y 3 cm de ancho. Sus brotes son largas flores blancas que suelen vivir mucho tiempo',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Monstera',
            'precio' => '2500',
            'descripción' => 'La monstera es de un atractivo sin igual, por sus hojas imponentes y brillantes. Posee unos rizomas de tallos alargados',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Monstera adansonii',
            'precio' => '1900',
            'descripción' => 'La Monstera adansonii es una planta tropical de hojas en forma de esqueleto, es decir que tiene varios agujeros. Este diseño tan llamativo es una adaptación a las espesas selvas húmedas de América ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Singoriun',
            'precio' => '1700',
            'descripción' => 'Son plantas trepadoras que llegan a medir de 1.5 a 2.5 metros de alto, con tallos particularmente alargados. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lazo de amor',
            'precio' => '1700',
            'descripción' => 'Lo mejor de esta planta es, sin duda, que renueva ambientes afectados por monóxido de carbono y formaldehído presente en barnices, aerosoles y cosméticos. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Calathea',
            'precio' => '1600',
            'descripción' => '. Son plantas herbáceas, rizomatosas, que en estado espontáneo pueden alcanzar un metro de altura, mientras que si son cultivadas no rebasan los 50-60 cm. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pothus',
            'precio' => '1400',
            'descripción' => 'El potos es una planta purificadora que puede ayudarnos a mejorar nuestro entorno y salud.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '1',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        ////////////////////////////////////////////////////////

        DB::table('productos')->insert([
            'nombre' => 'Orquidea',
            'precio' => '3400',
            'descripción' => 'Las orquídeas son plantas tropicales que se caracterizan por sus populares flores, con tres sépalos: dos pétalos y un lobelo, en donde se posa el insecto polinizador. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '4',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Amapola de california',
            'precio' => '3200',
            'descripción' => 'Es una planta de pequeño tamaño de tonos intensos con un tallo muy fino y alargado, aunque es conocida por su flor.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '4',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Jazmin nocturno',
            'precio' => '4100',
            'descripción' => 'Sus hojas son simples, alternas y se distribuyen en la rama formando un plano (dísticas); estas tienen forma de óvalo alargado y sus bordes son enteros  ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '4',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Iris japones',
            'precio' => '5100',
            'descripción' => 'Iris japonica o lírio de Japón es una planta rizomatosa perenne, que puede crecer hasta medio metro. Es fácil de cultivar en jardines templados cálidos',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '4',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Plumeria',
            'precio' => '2700',
            'descripción' => 'Plumeria es un pequeño género de plantas nativas de las regiones tropicales y subtropicales de América.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '4',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        ////////////////////////////////////////////////////////////////

        DB::table('productos')->insert([
            'nombre' => 'Rosa',
            'precio' => '800',
            'descripción' => 'Considerada símbolo de amor, belleza y sensualidad, es una de las flores más buscadas. Además, que representen admiración, cariño y respeto, las ha llevado a ser el regalo ideal ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lirio',
            'precio' => '750',
            'descripción' => 'La forma de estas flores es similar a la de una trompeta, se caracterizan por tener un aroma fuerte y agradable que incrementa durante la noche',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Margarita',
            'precio' => '890',
            'descripción' => 'La margarita es una planta con flor que puede llegar a medir entre 0,50 a 1,50 metros de altura. Es una flor que es fácil de identificar por sus alargados pétalos de colores',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Clavel',
            'precio' => '750',
            'descripción' => 'Los claveles poseen hojas lineales, angostas, opuestas y envainadoras, y cada tallo forma una flor terminal de no menos de cinco pétalos festoneados (con ondas) o con dientecillos. ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Girasol',
            'precio' => '680',
            'descripción' => 'Los frutos tienen la forma típica del girasol. Las hojas y el tallo son muy ásperos al tacto.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Gerbera',
            'precio' => '1450',
            'descripción' => 'Es conocida como la margarita africana. Margarita por su tremendo parecido a esta flor y africana por sus orígenes.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '3',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        ///////////////////////////////////////////////////////////////

        DB::table('productos')->insert([
            'nombre' => 'Caja de carton para arreglos',
            'precio' =>'500',
            'descripción' => 'Las cajas de cartón son un soporte ecológico, imprescindible tanto para floristerías como para personas que buscan un envase respetuoso para las flores de su hogar.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Papel celofan',
            'precio' => '320',
            'descripción' => 'Que hermosos se ven los ramos de flores envueltos en papel, ¡es el regalo ideal para toda ocasión!',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Cinta decorativa',
            'precio' => '250',
            'descripción' => 'Cinta floral tape verde, ideal para forrar alambre, hacer tallos de flores, etc. Muy utilizada para tocados, flores artificiales, arreglos florales, etc.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Tijera de podar',
            'precio' => '650',
            'descripción' => 'Una tijera de podar es una herramienta de corte que se utiliza para la poda de árboles, setos o plantas ornamentales.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Maceta ceramica',
            'precio' =>'780',
            'descripción' => 'Buena porosidad y buen drenaje, lo que aporta comodidad a las plantas ya que el material permite el paso del aire y la humedad.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Palo tutor',
            'precio' => '740',
            'descripción' => 'Un tutor de musgo es una muy buena alternativa para que las plantas trepadoras puedan crecer con normalidad y mucha fuerza.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Portamaceta',
            'precio' => '840',
            'descripción' => 'Portamaceta estilo nórdico. Altura x Ancho x Largo, 25 cm x 24 cm x 24 cm  ',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Perlita ',
            'precio' => '880',
            'descripción' => 'Mejora el drenaje, una de las principales funciones para las que sirve la perlita. Favorece la aireación del suelo. Ayuda a retener humedad',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' =>'Sustrato',
            'precio' =>'560',
            'descripción' => 'Los sustratos sirven para la retención agua y nutrientes, es un lugar de intercambio de gases y los nutrientes.',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Florero',
            'precio' => '630',
            'descripción' => 'Florero de cristal',
            'color' => $colores[array_rand($colores)],
            'imagen'=>Str::random(),
            'id_imagen'=>Str::random(),
            'tipo_categoria' => '5',
            'tipo_tamaño' => $tipos_tamaño->random(),
        ]);
        
        */
}
