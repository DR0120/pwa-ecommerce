<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     DbSeeder::class
        // ]);
        DB::table('categorias')->insert([
            'nombre' => 'BOARD',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'TERJETA DE VIDEO',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'MEMORIAS RAM',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'MEMORIAS RAM P/PORTATILES',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PROCESADOR INTEL',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PROCESADOR AMD',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'REFRIGERACION P/PROCESADORES',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'DISCOS HHD/SSD',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'FUENTES DE PODER',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'CHASIS CASE TORRES',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'MOUSE',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'TECLADO',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'AUDIO/MICRO',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PAD MOUSE',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'JOISTICK CONT',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'MONITORES HOGAR/DISEÑO',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'MONITORES GAMER',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PORTATILES',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PORTATILES GAMER',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PARLANTES',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'TECLADO Y MOUSE',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'UPS',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'DISCOS EXTERNOS',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'TARJETAS DE SONIDO',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'SILLA GAMER',
        ]);

        // TABLA MARCAS

        DB::table('marcas')->insert([
            'nombre' => 'ASUS',
            'imagen' => 'https://thumbs.dreamstime.com/b/logotipo-de-asus-127699289.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'GIGABYTE',
            'imagen' => 'https://1000marcas.net/wp-content/uploads/2020/02/Gigabyte-Logo.png'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'MSI',
            'imagen' => 'https://1000marcas.net/wp-content/uploads/2020/03/MSI-emblema.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'AMD',
            'imagen' => 'https://www.muycomputerpro.com/wp-content/uploads/2011/11/amd-logo.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'INTEL',
            'imagen' => 'https://www.teknofilo.com/wp-content/uploads/2020/09/Logo-tipo-anterior.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'ASRock',
            'imagen' => 'https://pcmrace.s3.amazonaws.com/2020/11/asrocklogo-750x400.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'WESTER DIGITAL',
            'imagen' => 'https://www.razorman.net/reviewshardware/wp-content/uploads/western-digital-logo.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'TOSHIBA',
            'imagen' => 'https://cdn.freebiesupply.com/logos/large/2x/toshiba-1-logo-png-transparent.png'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'SAMSUNG',
            'imagen' => 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Logo_samsung_5.jpg'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'CORSAIR',
            'imagen' => 'http://hardzone.es/app/uploads/2014/01/Corsair-logo-690x335.png'
        ]);
        DB::table('marcas')->insert([
            'nombre' => 'LONGITECH',
            'imagen' => 'https://logodownload.org/wp-content/uploads/2018/03/logitech-logo.png'
        ]);

        // OFERTAS
        DB::table('ofertas')->insert([
            'descuento' => 0.00,
            'periodo_inicio' => '2021-03-09',
            'periodo_fin' => '2021-03-09',
        ]);

        // PRODUCTOS
        DB::table('productos')->insert([
            'categoria_id' => 1,
            'marca_id' => 1,
            'oferta_id' => 1,
            'cod' => 'BOA-001',
            'nombre' => 'ASUS H310M',
            'descripcion' => 'La ASUS PRIME H310M es una placa base de última generación preparada para soportar los procesadores Intel Core 8th generation (Intel Coffee Lake). Basado en el chipset Intel H310 Express, proporcionará un rendimiento óptimo para una configuración de última generación con un potente procesador. Soporta procesadores Intel Core Coffee Lake de octava generación, tarjetas gráficas PCI-Express 3.0 16x, unidades SATA de 6 Gbps y M.2, RAM DDR4 y dispositivos USB 3.0.',
            'precio_venta' => 264.00,
            'imagen' => 'ASUS H310M1.jpg',
            'imagenes' => '["ASUS H310M1.jpg","ASUS H310M2.jpg","ASUS H310M3.jpg","ASUS H310M4.jpg"]',
            'stock' => 20
        ]);

        //  USERS
        DB::table('users')->insert([
            'name' => 'admin',
            'apellido' => 'Rodriguez',
            'nro_documento' => '84758',
            'direccion' => 'UAGRM',
            'telefono' => 12345678,
            'email' => 'admin@admin.com',
            'password' => Hash::make('0120'),
            'rol' => 'admin',
            'puntos_acumulados' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'diego',
            'apellido' => 'Rodriguez',
            'nro_documento' => '84758',
            'direccion' => 'UAGRM',
            'telefono' => 12345678,
            'email' => 'user1@user.com',
            'password' => Hash::make('0120'),
            'rol' => 'user',
            'puntos_acumulados' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'mariela',
            'apellido' => 'Rodriguez',
            'nro_documento' => '84758',
            'direccion' => 'UAGRM',
            'telefono' => 12345678,
            'email' => 'user2@user.com',
            'password' => Hash::make('0120'),
            'rol' => 'user',
            'puntos_acumulados' => 0,
        ]);

        // FAVORITOS
        // DB::table('favoritos')->insert([
        //     'persona_id' => 2,
        //     'producto_id' => 25,
        // ]);
    }
}
