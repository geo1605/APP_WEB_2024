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
