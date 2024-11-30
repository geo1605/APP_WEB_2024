from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Article,Category
# Create your views here.

@login_required(login_url='inicio')
def list_art(request):

    #sacar de la base de datos
    articulos= Article.objects.all()

    return render(request,'articulos/articulos.html',{
    'title': 'Articulos',
    'content': 'listado de Articulos',
    'articulos': articulos
    })

@login_required(login_url='inicio')
def categorias(request):
    #sacar de la base de datos
    categorias= Category.objects.all()
    return render(request,'categorias/categorias.html',{
    'title': 'categorias',
    'content': 'listado de categorias',
    'categorias': categorias
    })