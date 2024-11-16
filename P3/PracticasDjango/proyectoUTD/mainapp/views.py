from django.shortcuts import render

# Create your views here.
def index(requets):
    return render(requets, 'mainapp/index.html', {
        'title': 'Inicio | pagina principal',
        'content':'Bienvenido a Index'
    })
def about(requets):
    return render(requets, 'mainapp/about.html', {
        'title': 'acerca de',
        'content':'somos un equipo de desarrollo de SW con Django'
    })

def mision(requets):
    return render(requets, 'mainapp/mision.html', {
        'title': 'mision de la utd'
    })
def vision(requets):
    return render(requets, 'mainapp/vision.html', {
        'title': 'vision de la utd'
    })
