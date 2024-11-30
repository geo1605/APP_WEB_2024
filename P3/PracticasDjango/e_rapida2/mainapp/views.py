from django.shortcuts import render

# Create your views here.
def index(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': 'Bienvenido a Index'
    })

def about(request):
    return render(request, 'mainapp/about.html', {
        'title': 'acerca de',
        'content': 'Bienvenido a Acerca de'
    })

def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision',
        'content': 'Bienvenido a mision'
    })

def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'vision',
        'content': 'Bienvenido a vision'
    })


def registro(request):
    return render(request, 'mainapp/Registro.html', {
        'title': 'Registro',
        'content': 'Bienvenido a Registro'
    })
def login(request):
    return render(request, 'mainapp/login.html', {
        'title': 'iniciar sesion',
        'content': 'Bienvenido a inicio de sesion'
    })


# Redirige a la URL deseada, por ejemplo, la página de inicio con error 404 2da forma
def error404_2(request, exception):
    return render(request,'mainapp/error404.html')
