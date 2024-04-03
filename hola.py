# Inicializar listas de ingresos y gastos

ingresos = []
gastos = []
listaGastos = []
# filtros = ["cetes","ahorro"]
filtros = []

# Procesar la entrada de ingresos y gastos
print("Ingrese los ingresos y gastos (escriba 'fin' para finalizar): ")
while True:
    elemento_input = input()

    # Terminar la entrada cuando se escribe 'fin'
    if elemento_input.lower() == 'fin':
        break

    # Filtrar las líneas que comienzan con '+' o '-'
    for filtro in filtros:
        if filtro in elemento_input:
            elemento_input="0"

    if elemento_input.startswith(('+', '-')):
        try:
            # Extraer el número de la entrada y agregarlo a la lista correspondiente

            numero = float(''.join(filter(lambda x: x.isdigit() or x in ['.', '-'], elemento_input)))
            # Determinar si es un ingreso o un gasto
            if '-' in elemento_input:
                gastos.append(numero*-1)
                x=''.join(caracter for caracter in elemento_input if caracter.isalpha() or caracter.isspace())
                x=x[1:]
                listaGastos.append(x)
            elif '+' in elemento_input:
                ingresos.append(numero)

        except ValueError:
            print("Error: Ingrese un número válido.")

# Calcular el saldo total
saldo_total = sum(ingresos) - sum(gastos)

# Imprimir el resultado
print("El saldo total es: {:.10f}".format(saldo_total))
print("Ingresos: {:.10f}".format(sum(ingresos)))
print("Gastos: {:.10f}".format(sum(gastos)))
print("Lista de gastos")
for gasto in gastos:
    print(gasto)
print("Nombre de gastos")
for listaGasto in listaGastos:
    print(listaGasto)
