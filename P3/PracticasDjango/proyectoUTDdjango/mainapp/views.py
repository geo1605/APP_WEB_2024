from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html',{
        'title':'Inicio',
        'content':'.:: Bienvenido a mi pagina de inicio'
    })

def about(request):
    return render(request, 'mainapp/about.html',{
        'title':'Acerca De',
        'content':'.:: Somo un equipo de desarrollo de SW Multiplataforma con Django ::.'
    })

def mision(request):
    return render(request, 'mainapp/mision.html',{
        'title':'Mision',
    })

def vision(request):
    return render(request, 'mainapp/vision.html',{
        'title':'Vision',
    })

def error404(request, exception=None):
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': '.:: Bienvenido a mi página de inicio ::.',
        'error_message': 'La pagina que buscas no existe, redirigiendo a la página principal.'
    })