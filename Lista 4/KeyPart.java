
public class KeyPart {
	String value;
	double score;
	
	public KeyPart(String value){
		this.value=value;
		this.score=0;
	}
	public void updateScore(double x){
		score+=x;
	}
	
	public double getScore(){
		return score;
	}
	
	@Override
	public String toString(){
		return value;
	}
}
