from django.contrib import admin
from django.urls import path,include
from . import views 

urlpatterns = [
    path('', views.index , name="index" ),
    path('orders/',views.receive_order_details,name='orders'),
    path('create_coupon/',views.create_coupon,name='create_coupon'),

]
