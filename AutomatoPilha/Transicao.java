package AutomatoPilha;

public class Transicao {
    private String estado;
    private String elementoAnterior;

    public Transicao(String estado, String elementoAnterior) {
        this.estado = estado;
        this.elementoAnterior = elementoAnterior;
    }

    public String getEstado() {
        return estado;
    }

    public String getElementoAnterior() {
        return elementoAnterior;
    }
}

