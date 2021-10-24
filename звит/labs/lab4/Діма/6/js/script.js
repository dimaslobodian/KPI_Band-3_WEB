let op='';
let result='';
function calc(value) {
    if (value.match('=')) {
		if (op!='')
		{
			switch (op)
			{
				case '^':
					array=result.split('^');
					result=Math.pow(array[0],array[1]);
					op='';
					break;
				case '/':
					array=result.split('/');
					result=array[0]/array[1]
					op='';
					break;
				case '%':
					array=result.split('%');
					result=array[0]%array[1]
					op='';
					break;
				case '*':
					array=result.split('*');
					result=array[0]*array[1]
					op='';
					break;
				case '+':
					array=result.split('+');
					result=Number(array[0])+Number(array[1])
					op='';
					break;
				case '-':
					array=result.split('-');
					result=array[0]-array[1]
					op='';
					break;

			}
		}
    } else if (value === 'C') {
        result = '';
		op='';
		
	} else if (value === '√') {
        result = Math.sqrt(result)
		
	} else if (value === '^') {
        op=value
		result += value
		
	} else if (value === '/') {
        op=value
		result += value
		
	} else if (value === '%') {
        op=value
		result += value
    
	} else if (value === '*') {
        op=value
		result += value
		
	} else if (value === '+') {
        op=value
		result += value
		
	} else if (value === '-') {
        op=value
		result += value
	
    } else {
        result += value
    }
	document.getElementById("result").innerHTML = result;
}