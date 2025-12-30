@extends('layout')
@section('titlePage', 'Bienvenido a '.$title)
@section('title', $title)
@section('image', $image)
@section('descriptionMain', $descriptionMain)

@section('section1')

    <section class="bg-center bg-gray-700 bg-no-repeat bg-blend-multiply " style="background-image: url('{{ asset('storage/irenearanguren/jumboirene.png') }}'); background-size: cover;">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">La presencia de tus productos y servicios en Internet ahora no es una opcion</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48"> Una landingPage es la portada de tu negocio, incluye un formulario, datos de contacto, redes sociales y mas</p> 
        </p>
    </div>
</section>
<section class="px-4  max-w-screen text-center py-8">
        <div class="w-full max" >
            <h2>
                sobre mi:
            </h2>
            <h3> 
                Soy Irene Aranguren, desarrolladora web y marketer. Creo landingpages, sitios web y aplicaciones web como parte de una estrategia de marketing digital.
            </h3>


</section>

@endsection

@section('section2')
    <section class="px-4  max-w-screen text-center py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="w-full max-w-sm max-h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
             <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Demo de catalogo</h5>
        </a>
    </div>
    <div>
        <p>
            explora una muestra de catalogo de productos con carrito y gestion de ordenes.
        </p>
    </div>
        </div>
        <div class="w-full max-w-sm max-h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
             <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Plan de marketing digital</h5>
        </a>
    </div>
    <div>
        <p>
            Ingegra tu landingpage con un plan de marketing digital con gestion de redes sociales y publicidad para potenciar tu presencia en linea.
        </p>    
    </div>
        </div>
    </div>
</section>
<section>
    <div>
        <div>
            <h2>
                Contactame
            </h2>
            <h3>
                Si quieres una landingpage para tu negocio o proyecto, no dudes en contactarme.
            </h3>
        </div>
        <div>
            <form action="">
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Mensaje</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div>
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection