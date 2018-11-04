import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;

public class Main {
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub

		ArrayList<String[]> ciphertext = new ArrayList<String[]>();
		int[][] matrix = null;
		int maxSize = 0;
		int numberOfCiphertexts=0;
		
		try {
			BufferedReader file = new BufferedReader(new FileReader("crypt.txt"));	
			String line = file.readLine();
			while(line!=null){
				ciphertext.add(line.split(" "));
				numberOfCiphertexts++;
				if(line.split(" ").length>maxSize)
					maxSize=line.split(" ").length;
				line=file.readLine();
			}
			matrix = new int[numberOfCiphertexts][maxSize];
			file.close();
			System.out.println("Za³adowano plik");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		for(int i=0; i<ciphertext.size();i++){
			String[] cipher1 = ciphertext.get(i);
			for(int j=i; j<ciphertext.size();j++){
				String[] cipher2 = ciphertext.get(j);
				int size = Math.min(cipher1.length,cipher2.length);
				int index=0;
				while(index<size){
					String xor = Integer.toBinaryString((Integer.parseInt(cipher1[index],2)^Integer.parseInt(cipher2[index],2)));
					while(xor.length()<8){
						xor="0"+xor;
					}
					if(xor.charAt(0)=='0'&&xor.charAt(1)=='1'){
						matrix[i][index]++;
						matrix[j][index]++;
					}
					index++;
				}
				
			}
		}
		
		ArrayList<ArrayList<KeyPart>> key = new ArrayList<ArrayList<KeyPart>>();
		for(int i=0; i<maxSize; i++)
			key.add(new ArrayList<KeyPart>());
		for(int i=0; i<maxSize; i++){
			int max=0;
			ArrayList<Integer> maxid= new ArrayList<Integer>();
			for(int j=0; j<numberOfCiphertexts; j++){
				
				if(matrix[j][i]>max){
					max=matrix[j][i];
					maxid=new ArrayList<Integer>();
					maxid.add(j);
				}
				else if(matrix[j][i]==max&&max>0)
					maxid.add(j);
					
			}
			if(max==0){
				for(int k=0; k<numberOfCiphertexts; k++){
					if(ciphertext.get(k).length-1>=i){
						maxid.add(k);
					}
				}
			}
			for(int k=0; k<maxid.size(); k++){
				key.get(i).add(new KeyPart(ciphertext.get(maxid.get(k))[i]));
			}
			
		}
		for (int i = 0; i< key.size(); i++) {
			for(int j=0; j<key.get(i).size(); j++)
				key.get(i).set(j, new KeyPart(Integer.toBinaryString((Integer.parseInt(key.get(i).get(j).toString(),2)^Integer.parseInt("00100000",2)))));
		}
		
		
		for (int i = 0; i< key.size(); i++) {
			int[] score =new int[key.get(i).size()];
			Arrays.fill(score,0);
			for(int j=0; j<key.get(i).size(); j++)
				for(int k=0; k<ciphertext.size();k++){
					if(ciphertext.get(k).length-1>=i){
						char c = (char) (Integer.parseInt(key.get(i).get(j).toString(),2)^Integer.parseInt(ciphertext.get(k)[i],2));
						switch (c) {
						case 'A': key.get(i).get(j).updateScore(14.8/4);
						case 'a': key.get(i).get(j).updateScore(14.8);
						
						case 'E': key.get(i).get(j).updateScore(13.3/4);
						case 'e': key.get(i).get(j).updateScore(13.3);
						
						case 'O': key.get(i).get(j).updateScore(11.0/4);
						case 'o': key.get(i).get(j).updateScore(11);
						
						case 'I': key.get(i).get(j).updateScore(10.9/4);
						case 'i': key.get(i).get(j).updateScore(10.9);
						
						case 'Z': key.get(i).get(j).updateScore(7.9/4);
						case 'z': key.get(i).get(j).updateScore(7.9);
						
						case 'N': key.get(i).get(j).updateScore(7.7/4);
						case 'n': key.get(i).get(j).updateScore(7.7);
						
						case 'R': key.get(i).get(j).updateScore(7.5/4);
						case 'r': key.get(i).get(j).updateScore(7.5);
						
						case 'W': key.get(i).get(j).updateScore(6.35/4);
						case 'w': key.get(i).get(j).updateScore(6.35);
						
						case 'S': key.get(i).get(j).updateScore(5.12/4);
						case 's': key.get(i).get(j).updateScore(5.12);
						
						case 'T': key.get(i).get(j).updateScore(4.58/4);
						case 't': key.get(i).get(j).updateScore(4.58);
						
						case 'C': key.get(i).get(j).updateScore(4.16/4);
						case 'c': key.get(i).get(j).updateScore(4.16);
						
						case 'Y': key.get(i).get(j).updateScore(3.76/4);
						case 'y': key.get(i).get(j).updateScore(3.76);
						
						case 'K': key.get(i).get(j).updateScore(3.61/4);
						case 'k': key.get(i).get(j).updateScore(3.61);
						
						case 'D': key.get(i).get(j).updateScore(3.75/4);
						case 'd': key.get(i).get(j).updateScore(3.75);
						
						case 'P': key.get(i).get(j).updateScore(3.33/4);
						case 'p': key.get(i).get(j).updateScore(3.33);
						
						case 'M': key.get(i).get(j).updateScore(3.50/4);
						case 'm': key.get(i).get(j).updateScore(3.50);
						
						case 'U': key.get(i).get(j).updateScore(2.60/4);
						case 'u': key.get(i).get(j).updateScore(2.60);
						
						case 'J': key.get(i).get(j).updateScore(2.18/4);
						case 'j': key.get(i).get(j).updateScore(2.18);
						
						case 'L': key.get(i).get(j).updateScore(1.75/4);
						case 'l': key.get(i).get(j).updateScore(1.75);
						
						case 'B': key.get(i).get(j).updateScore(1.37/4);
						case 'b': key.get(i).get(j).updateScore(1.37);
						
						case 'G': key.get(i).get(j).updateScore(1.32/4);
						case 'g': key.get(i).get(j).updateScore(1.32);
						
						case 'H': key.get(i).get(j).updateScore(0.5/4);
						case 'h': key.get(i).get(j).updateScore(0.5);
						
						case 'F': key.get(i).get(j).updateScore(0.4/4);
						case 'f': key.get(i).get(j).updateScore(0.4);
						
						case 'Q': key.get(i).get(j).updateScore(0.23/4);
						case 'q': key.get(i).get(j).updateScore(0.23);
						
						case 'V': key.get(i).get(j).updateScore(0.19/4);
						case 'v': key.get(i).get(j).updateScore(0.19);
						
						case 'X': key.get(i).get(j).updateScore(0.15/4);
						case 'x': key.get(i).get(j).updateScore(0.15);
						
						case ' ': key.get(i).get(j).updateScore(12.2);
						
						case ',': key.get(i).get(j).updateScore(1.55);
						
						case '.': key.get(i).get(j).updateScore(0.5);
						
						case '?': key.get(i).get(j).updateScore(0.65);
						
						case '!': key.get(i).get(j).updateScore(0.35);
						
						case ':': key.get(i).get(j).updateScore(0.25);

						case ';': key.get(i).get(j).updateScore(0.50);
						
						case '(':
						case ')':
						case '[':
						case ']':
						case '"':
						case '-': key.get(i).get(j).updateScore(0.25);
						
						case '+':
						case '=':
						case '*':
						case '/':
						case '~':
						case '0':
						case '1':
						case '2':
						case '3':
						case '4':
						case '5':
						case '6':
						case '7':
						case '8':
						case '9': key.get(i).get(j).updateScore(-40);
						
						default: key.get(i).get(j).updateScore(-25);
						}
						
					}
				}
		}
		
		for(ArrayList<KeyPart> k : key){
			for(int i=0; i<k.size(); i++){
				KeyPart p=k.get(i);
				if((p.getScore()<0)&&k.size()>1){
					k.remove(p);
					i--;
				}
					
			}
		}
		for(ArrayList<KeyPart> k : key){
			Collections.sort(k,new Comparator<KeyPart>(){
				@Override
				public int compare(KeyPart part1, KeyPart part2) {
					// TODO Auto-generated method stub
					return Double.compare(part1.getScore(),part2.getScore());
				}
			});
		}
		
		for(int i=0; i<ciphertext.size();i++){
			for(int j=0; j<ciphertext.get(i).length; j++){
				System.out.print((char) (Integer.parseInt(key.get(j).get(0).toString(),2)^Integer.parseInt(ciphertext.get(i)[j],2)));
			}
			System.out.println();
		}
	}

}
