package AutomatoPilha;
import java.util.HashMap;
import java.util.Map;

public class PilhaAgoraVai {

    public static void main(String[] args) {
        Map<String, Transicao> delta = new HashMap<>();
        delta.put("q0,programa,Z0", new Transicao("q1", "'id(id:int){'.'programa'"));
        delta.put("q1,comandos,'id(id:int){'.'programa'", new Transicao("q1","'comando,if(id>0){'.'id(id:int){'"));
        delta.put("q1,comando,'if(id>0){'.'id(id:int){'", new Transicao("q1", "'id=id/2;}'.'if(id>0){'"));
        delta.put("q1,'id=id/2;}',if(id>0){", new Transicao("q1", "'else{'.'id=id/2;}'"));
        delta.put("q1,'else{'.'id=id/2;}'", new Transicao("q1,", "'id=0;}'.'else{'"));
        delta.put("q1,'id=0;}',if(id>0){", new Transicao("q2,", "'return id}'. "));

        String palavra = "programa";
        String estadoAtual = "q0";
        String elementoAnterior = "Z0";

        for (char symbol : palavra.toCharArray()) {
            String key = estadoAtual + "," + symbol + "," + elementoAnterior;
            Transicao trans = delta.get(key);
            if (trans == null) {
                break;
            }
            estadoAtual = trans.getEstado();
            elementoAnterior = trans.getElementoAnterior();
        }

        System.out.println("Estado final: " + estadoAtual);
        System.out.println("Elemento anterior: " + elementoAnterior);
    }
}
