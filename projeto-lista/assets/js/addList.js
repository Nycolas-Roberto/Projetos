function adicionar(){
    let tarefa = document.getElementById('tarefa'); // Input Tarefa
    let lista = document.getElementById('lista'); // Lista para adicionar os valores
    let valores = []; // Vetor das tarefas
    if(tarefa.value.length <= 250 && tarefa.value.length >= 1) { // Verificar input
        valores.push(tarefa.value); // Adicionar valor do input no vetor das tarefas
        let resp = document.createElement('p'); // Criar uma tag LI
        resp.innerText = `${tarefa.value}`; // Adicionar o valor da tarefa na div criada
        lista.appendChild(resp); // Anexar a resposta na lista para adicionar os valores
    } else {
        return false
    }

    // Após terminar a condicional o valor do input será resetado
    tarefa.value = '';
    tarefa.focus();
}