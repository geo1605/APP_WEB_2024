from django.shortcuts import render, HttpResponse, redirect

# Create your views here.
def index(requets):
    return render(requets,'mainapp/index.html',{
        'tittle':'Inicio',
        'content':'Bienvenido a mi pagina de incio',
    })

def acercade(requets):
    return render(requets,'mainapp/about.html',{
        'tittle':'Acerca de ...',
        'content':'Somos una empresa de desarrollo de SW Multiplataforma con Django',
    })

def mision(requets):

    return render(requets,'mainapp/mision.html',{
        'tittle':'Mision',
    })

def vision(requets):
    #HttpResponse(html)
    
    '''
    return HttpResponse("""
        <h1>Vision</h1>
    <p>La visión de la Universidad Tecnológica de Durango es ser una institución educativa de vanguardia, reconocida a nivel nacional e internacional por la calidad de sus programas educativos, su innovación y su compromiso con la formación integral de sus estudiantes, con miras a impactar positivamente en el entorno social y empresarial.</p>
    """)
    '''
    return render(requets,'mainapp/vision.html',{
        'tittle':'Vision',
    })

# En views.py

#Redireccion 404
def redireccion_404(request, exception):
    # Redirige a la URL deseada, por ejemplo, la página de inicio
    return redirect('inicio') 
#redireccion segunda forma
def error_404_2(request, exception):
    return render(request, 'mainapp/404.html')

